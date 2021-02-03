<?php

declare(strict_types = 1);

namespace App\Observers;

use App\Models\InventoryItem;

/**
 * Class InventoryItemObserver
 *
 * @package App\Observers
 */
class InventoryItemObserver
{
    /**
     * @param \App\Models\InventoryItem $item
     *
     * @return void
     */
    public function updated(InventoryItem $item): void
    {
        foreach ($item->getAttributes() as $key => $value) {
            if (!$item->originalIsEquivalent($key, $value)) {
                $item->history()->create([
                    'field_name' => $key,
                    'old_value' => $item->getOriginal($key),
                    'new_value' => $value,
                ]);
            }
        }
    }
}
