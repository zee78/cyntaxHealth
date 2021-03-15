<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskAssignment extends FormRequest
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
            'name_of_task' => 'required',
            'date_of_task_assignment' => 'required',
            'deadline_for_task_submission' => 'required',
            'nature_of_task' => 'required',
            'description_of_task' => 'required',
        ];
    }
}
