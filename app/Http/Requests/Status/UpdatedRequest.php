<?php

declare(strict_types = 1);

namespace App\Http\Requests\Status;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdatedRequest.
 *
 * @package App\Http\Requests\Status
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
            'name' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
