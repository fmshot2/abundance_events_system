<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            'title'            => ['required', 'max:255', 'string'],
            'details'          => ['required', 'string'],
            'date'             => ['nullable', 'string'],
            'time_start'       => ['nullable', 'string'],
            'time_end'         => ['nullable', 'string'],

            // 'event_id'         => ['required', 'string']
        ];
    }
}
