<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Placement
 *
 * @package App\Models
 */
class Placement extends Model
{
    /**
     * @var string
     */
    protected $table = 'placements';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'name' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(
            InventoryItem::class,
            'placement_id',
            $this->primaryKey
        );
    }
}
