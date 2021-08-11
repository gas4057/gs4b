<?php

namespace App\Http\Requests;

class ProductRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'per_page' => 'sometimes|numeric|min:1',
            'sort_by' => 'sometimes|in:asc,desc',
            'min_price' => 'sometimes|numeric',
            'max_price' => 'sometimes|numeric',
            'categories' => 'sometimes|array',
            'categories.*' => 'exists:categories,id'
        ];
    }

}
