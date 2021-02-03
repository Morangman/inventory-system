<?php

declare(strict_types = 1);

namespace App\Http\Requests\InventoryItem;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdatedRequest.
 *
 * @package App\Http\Requests\InventoryItem
 */
class UpdatedRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'category_id' => [
                'required',
                'exists:categories,id',
            ],
            'status_id' => [
                'required',
                'exists:statuses,id',
            ],
            'placement_id' => [
                'required',
                'exists:placements,id',
            ],
            'price' => [
                'nullable',
                'numeric',
            ],
            'model' => [
                'nullable',
                'string',
                'max:255',
            ],
            'placement_comment' => [
                'nullable',
                'max:255',
            ],
            'comment' => [
                'nullable',
                'max:255',
            ],
            'purchased_at' => [
                'nullable',
                'date',
            ],
        ];
    }
}
