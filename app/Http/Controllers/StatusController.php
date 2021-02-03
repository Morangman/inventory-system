<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\Status\StoreRequest;
use App\Http\Requests\Status\UpdatedRequest;
use App\Models\Status;
use App\Utilities\DataTable;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Lang;
use Session;
use URL;
use View;

/**
 * Class StatusController
 *
 * @package App\Http\Controllers
 */
class StatusController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): ViewContract
    {
        return View::make('status.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $dataTable = new DataTable(Status::query(), $request);

        $data = $dataTable->setMap(function (Status $status) use ($dataTable) {
            $id = $status->getKey();
            $editLink = URL::route('status.edit', $id);

            return [
                $id,
                '<a href="'.URL::route('status.edit', $status).'">'.$status->getAttribute('name').'</a>',
                $dataTable->buildActions([
                    $dataTable->buildEditAction($editLink),
                    $dataTable->buildDeleteAction(
                        URL::route('status.destroy', $id),
                        'status',
                        $id
                    ),
                ]),
            ];
        })->setOrderColumns([
            0 => 'id',
            1 => 'name',
        ])->build();

        return new JsonResponse($data);
    }

    /**
     * @param \App\Models\Status $status
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Status $status): ViewContract
    {
        return View::make('status.edit', [
            'status' => $status
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): ViewContract
    {
        return View::make('status.create', [
            'statuses' => Status::all()
        ]);
    }

    /**
     * @param \App\Http\Requests\Status\StoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        Status::create($request->all());

        Session::flash('status', Lang::get('status.messages.stored'));

        return new RedirectResponse(URL::route('status.index'), 302);
    }

    /**
     * @param \App\Http\Requests\Status\UpdatedRequest $request
     * @param \App\Models\Status $status
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatedRequest $request, Status $status): RedirectResponse
    {
        $status->update($request->all());

        Session::flash('status', Lang::get('status.messages.updated'));

        return new RedirectResponse(URL::route('status.index'), 302);
    }

    /**
     * @param \App\Models\Status $status
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy(Status $status): RedirectResponse
    {
        $status->delete();

        Session::flash('status', Lang::get('status.messages.deleted'));

        return new RedirectResponse(URL::route('status.index'), 302);
    }
}
