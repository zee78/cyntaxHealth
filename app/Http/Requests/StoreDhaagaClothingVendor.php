<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDhaagaClothingVendor extends FormRequest
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
            'vendor_type' => 'required',
            'vendor_name' => 'required',
            'product_purchased' => 'required',
            'phoneNo' => 'required|numeric',
            'address' => 'required',
        ];
    }
}
