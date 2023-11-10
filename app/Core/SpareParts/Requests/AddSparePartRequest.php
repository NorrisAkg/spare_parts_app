<?php

namespace App\Core\SpareParts;

use Illuminate\Foundation\Http\FormRequest;

class AddSparePartRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            "reference"    => "required|string|unique:spare_parts",
            "designation"  => "required|string",
            "price"        => "required|numeric",
            "brand"        => "required|string",
            "description"  => "required|string",
            "pictures"     => "required|array",
            "pictures.*"   => "file|array",
        ];
    }
}
