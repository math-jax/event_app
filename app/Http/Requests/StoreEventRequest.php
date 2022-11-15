<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Event Title Field',
            'description' => 'Event Description Field',
            'start_date' => 'Event Start Date Field',
            'end_date' => 'Event End Date Field',
            'image' => 'Event Image Field',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute is required',
            'string' => 'The :attribute must be string',
            'date' => 'The :attribute must be date',
        ];
    }
}
