<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\InventoryItemHistory;
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
 * Class InventoryItemHistoryController
 *
 * @package App\Http\Controllers
 */
class InventoryItemHistoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): ViewContract
    {
        return View::make('history.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $dataTable = new DataTable(InventoryItemHistory::query(), $request);

        $data = $dataTable->setMap(function (InventoryItemHistory $inventoryItemHistory) use ($dataTable) {
            $item = $inventoryItemHistory->getAttribute('item');
            $createdAt = $inventoryItemHistory->getAttribute('created_at');

            return [
                $inventoryItemHistory->getKey(),
                '<a href="'.URL::route('item.edit', $item).'">'.$item->getKey().'</a>',
                $inventoryItemHistory->getAttribute('field_name'),
                $inventoryItemHistory->getAttribute('normalized_old_value'),
                $inventoryItemHistory->getAttribute('normalized_new_value'),
                $createdAt->format('d.m.y'),
            ];
        })->setOrderColumns([
            0 => 'id',
            1 => 'item_id',
            2 => 'field_name',
            3 => 'old_value',
            4 => 'new_value',
            5 => 'created_at',
        ])->build();

        return new JsonResponse($data);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear(): RedirectResponse
    {
        InventoryItemHistory::truncate();

        Session::flash('status', Lang::get('history.messages.cleaning'));

        return new RedirectResponse(URL::route('history.index'), 302);
    }
}
