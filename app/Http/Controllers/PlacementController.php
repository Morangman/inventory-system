<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\Placement\StoreRequest;
use App\Http\Requests\Placement\UpdatedRequest;
use App\Models\Placement;
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
 * Class PlacementController
 *
 * @package App\Http\Controllers
 */
class PlacementController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): ViewContract
    {
        return View::make('placement.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $dataTable = new DataTable(Placement::query(), $request);

        $data = $dataTable->setMap(function (Placement $placement) use ($dataTable) {
            $id = $placement->getKey();
            $editLink = URL::route('placement.edit', $id);

            return [
                $id,
                '<a href="'.URL::route('placement.edit', $placement).'">'.$placement->getAttribute('name').'</a>',
                $dataTable->buildActions([
                    $dataTable->buildEditAction($editLink),
                    $dataTable->buildDeleteAction(
                        URL::route('placement.destroy', $id),
                        'placement',
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
     * @param \App\Models\Placement $placement
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Placement $placement): ViewContract
    {
        return View::make('placement.edit', [
            'placement' => $placement,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): ViewContract
    {
        return View::make('placement.create', [
            'placements' => Placement::all(),
        ]);
    }

    /**
     * @param \App\Http\Requests\Placement\StoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        Placement::create($request->all());

        Session::flash('status', Lang::get('placement.messages.stored'));

        return new RedirectResponse(URL::route('placement.index'), 302);
    }

    /**
     * @param \App\Http\Requests\Placement\UpdatedRequest $request
     * @param \App\Models\Placement $placement
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatedRequest $request, Placement $placement): RedirectResponse
    {
        $placement->update($request->all());

        Session::flash('status', Lang::get('placement.messages.updated'));

        return new RedirectResponse(URL::route('placement.index'), 302);
    }

    /**
     * @param \App\Models\Placement $placement
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy(Placement $placement): RedirectResponse
    {
        $placement->delete();

        Session::flash('status', Lang::get('placement.messages.deleted'));

        return new RedirectResponse(URL::route('placement.index'), 302);
    }
}
