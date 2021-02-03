<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\InventoryItem\StoreRequest;
use App\Http\Requests\InventoryItem\UpdatedRequest;
use App\Models\Category;
use App\Models\InventoryItem;
use App\Models\Placement;
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
 * Class InventoryItemController
 *
 * @package App\Http\Controllers
 */
class InventoryItemController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): ViewContract
    {
        return View::make('index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $dataTable = new DataTable(InventoryItem::query(), $request);

        $data = $dataTable->setMap(function (InventoryItem $inventoryItem) use ($dataTable) {
            $category = $inventoryItem->getAttribute('category');
            $status = $inventoryItem->getAttribute('status');
            $placement = $inventoryItem->getAttribute('placement');
            $purchasedDate = $inventoryItem->getAttribute('purchased_at');

            $id = $inventoryItem->getKey();
            $editLink = URL::route('item.edit', $id);

            return [
                $id,
                '<a href="'.URL::route('category.edit', $status).'">'.$category->getAttribute('name').'</a>',
                '<a href="'.URL::route('status.edit', $status).'">'.$status->getAttribute('name').'</a>',
                '<a href="'.URL::route('placement.edit', $placement).'">'.$placement->getAttribute('name').'</a>',
                $inventoryItem->getAttribute('model'),
                $inventoryItem->getAttribute('price'),
                $inventoryItem->getAttribute('placement_comment'),
                $inventoryItem->getAttribute('comment'),
                $purchasedDate ? $purchasedDate->format('d.m.y') : '',
                $dataTable->buildActions([
                    $dataTable->buildEditAction($editLink),
                    $dataTable->buildDeleteAction(
                        URL::route('item.destroy', $id),
                        'item',
                        $id
                    ),
                ]),
            ];
        })->setOrderColumns([
            0 => 'id',
            1 => 'category_id',
            2 => 'status_id',
            3 => 'placement_id',
            4 => 'model',
            5 => 'price',
            6 => 'placement_comment',
            7 => 'comment',
            8 => 'purchased_at',
        ])->build();

        return new JsonResponse($data);
    }

    /**
     * @param \App\Models\InventoryItem $item
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(InventoryItem $item): ViewContract
    {
        return View::make('item.edit', [
            'item' => $item,
            'categories' => Category::all(),
            'statuses' => Status::all(),
            'placements' =>  Placement::all(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): ViewContract
    {
        return View::make('item.create', [
            'categories' => Category::all(),
            'statuses' => Status::all(),
            'placements' =>  Placement::all(),
        ]);
    }

    /**
     * @param \App\Http\Requests\InventoryItem\StoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        InventoryItem::create($request->all());

        Session::flash('status', Lang::get('item.messages.stored'));

        return new RedirectResponse(URL::route('index'), 302);
    }

    /**
     * @param \App\Http\Requests\InventoryItem\UpdatedRequest $request
     * @param \App\Models\InventoryItem $item
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatedRequest $request, InventoryItem $item): RedirectResponse
    {
        $item->update($request->all());

        Session::flash('status', Lang::get('item.messages.updated'));

        return new RedirectResponse(URL::route('index'), 302);
    }

    /**
     * @param \App\Models\InventoryItem $item
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy(InventoryItem $item): RedirectResponse
    {
        $item->delete();

        Session::flash('status', Lang::get('item.messages.deleted'));

        return new RedirectResponse(URL::route('index'), 302);
    }
}
