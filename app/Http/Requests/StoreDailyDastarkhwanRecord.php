<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDailyDastarkhwanRecord extends FormRequest
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
            'date' => 'required',
            'location' => 'required',
            'name_of_items_distributed' => 'required',
            'timing' => 'required',
            'number_of_people' => 'required',
            'amount_collected' => 'required',
        ];
    }
}
