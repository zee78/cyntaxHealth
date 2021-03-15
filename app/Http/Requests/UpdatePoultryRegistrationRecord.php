<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePoultryRegistrationRecord extends FormRequest
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
            'name' => 'required',
            'cnic' => 'required',
            'phoneNo' => 'required|numeric',
            'enrolment_date' => 'required',
            'number_of_poultry_given' => 'required|numeric',
            'amount_status' => 'required',
            'address' => 'required',
        ];
    }
}
