<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdatedRequest;
use App\Models\User;
use App\Utilities\DataTable;
use Hash;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Lang;
use Session;
use URL;
use View;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): ViewContract
    {
        return View::make('user.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $dataTable = new DataTable(User::query(), $request);

        $data = $dataTable->setMap(function (User $user) use ($dataTable) {
            $isAdmin = $user->getAttribute('is_admin');
            $isBlocked = $user->getAttribute('is_blocked');

            $id = $user->getKey();
            $editLink = URL::route('user.edit', $id);

            return [
                $id,
                '<a href="'.URL::route('user.edit', $user).'">'.$user->getAttribute('first_name').'</a>',
                $user->getAttribute('last_name'),
                $user->getAttribute('email'),
                $isAdmin ? 'true' : 'false',
                $isBlocked ? 'true' : 'false',
                $dataTable->buildActions([
                    $dataTable->buildEditAction($editLink),
                    $dataTable->buildDeleteAction(
                        URL::route('user.destroy', $id),
                        'user',
                        $id
                    ),
                ]),
            ];
        })->setOrderColumns([
            0 => 'id',
            1 => 'first_name',
            2 => 'last_name',
            3 => 'email',
            4 => 'is_admin',
            5 => 'is_blocked',
        ])->build();

        return new JsonResponse($data);
    }

    /**
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(User $user): ViewContract
    {
        return View::make('user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): ViewContract
    {
        return View::make('user.create');
    }

    /**
     * @param \App\Http\Requests\User\StoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        User::create(['password' => $request->get('password')] + $request->all());

        Session::flash('status', Lang::get('user.messages.stored'));

        return new RedirectResponse(URL::route('user.index'), 302);
    }

    /**
     * @param \App\Http\Requests\User\UpdatedRequest $request
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatedRequest $request, User $user): RedirectResponse
    {
        $user->update($request->all(['is_admin', 'is_blocked']) + $request->all());

        Session::flash('status', Lang::get('user.messages.updated'));

        return new RedirectResponse(URL::route('user.index'), 302);
    }

    /**
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        Session::flash('status', Lang::get('user.messages.deleted'));

        return new RedirectResponse(URL::route('user.index'), 302);
    }
}
