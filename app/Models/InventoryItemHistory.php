<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use const null;

/**
 * Class InventoryItemHistory
 *
 * @package App\Models
 */
class InventoryItemHistory extends Model
{
    /**
     * @var string
     */
    protected $table = 'inventory_item_histories';

    /**
     * @var array
     */
    protected $fillable = [
        'item_id',
        'field_name',
        'old_value',
        'new_value',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'item_id' => 'int',
        'field_name' => 'string',
        'old_value' => 'string',
        'new_value' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(
            InventoryItem::class,
            'item_id',
            'id',
            'item'
        );
    }

    /**
     * @return string|null
     */
    public function getNormalizedOldValueAttribute(): ?string
    {
        return $this->getNormalizedValue('old_value');
    }

    /**
     * @return string|null
     */
    public function getNormalizedNewValueAttribute(): ?string
    {
        return $this->getNormalizedValue('new_value');
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    protected function getNormalizedValue(string $key): ?string
    {
        if (null === ($value = $this->attributes[$key])) {
            return null;
        }

        switch ($key) {
            case 'category_id':
                return Category::query()->findOrFail($value)->getAttribute('name');

            case 'status_id':
                return Status::query()->findOrFail($value)->getAttribute('name');

            case 'placement_id':
                return Placement::query()->findOrFail($value)->getAttribute('name');

            default:
                return $value;
        }
    }
}
