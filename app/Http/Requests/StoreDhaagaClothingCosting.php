<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDhaagaClothingCosting extends FormRequest
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
            'code' => 'required',
            'type' => 'required',
            'marketing_cost' => 'required',
            'profit_percentage' => 'required',
            'profit_amount' => 'required',
            'gst' => 'required',
            'total_direct_cost' => 'required',
            'market_retail_price' => 'required',
        ];
    }
}
