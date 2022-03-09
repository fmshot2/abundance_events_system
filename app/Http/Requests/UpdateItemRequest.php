<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
            'title'            => ['sometimes', 'required', 'max:255', 'string'],
            'details'          => ['sometimes', 'required', 'string'],
            'date'             => ['sometimes', 'required', 'string'],
            'time'             => ['sometimes', 'required', 'string'],
        ];
    }
}
