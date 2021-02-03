<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class InventoryItem
 *
 * @package App\Models
 */
class InventoryItem extends Model
{
    /**
     * @var string
     */
    protected $table = 'inventory_items';

    /**
     * @var array
     */
    protected $fillable = [
        'category_id',
        'status_id',
        'placement_id',
        'placement_comment',
        'comment',
        'model',
        'price',
        'purchased_at',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'category_id' => 'int',
        'status_id' => 'int',
        'placement_id' => 'int',
        'placement_comment' => 'string',
        'comment' => 'string',
        'model' => 'string',
        'price' => 'float',
        'purchased_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(
            Category::class,
            'category_id',
            'id',
            'category'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history(): HasMany
    {
        return $this->hasMany(
            InventoryItemHistory::class,
            'item_id',
            $this->primaryKey
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function placement(): BelongsTo
    {
        return $this->belongsTo(
            Placement::class,
            'placement_id',
            'id',
            'placement'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(
            Status::class,
            'status_id',
            'id',
            'status'
        );
    }
}
