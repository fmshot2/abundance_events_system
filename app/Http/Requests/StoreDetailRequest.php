<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetailRequest extends FormRequest
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
            'details'           => ['nullable', 'string'],
            'phone_1'           => ['nullable', 'string', 'max: 11'],
            'phone_2'           => ['nullable', 'string', 'max: 11'],
            'phone_3'           => ['nullable', 'string', 'max: 11'],
            'email_1'           => ['nullable', 'email'],
            'email_2'           => ['nullable', 'email'],
            'email_3'           => ['nullable', 'email'],
            'address'           => ['nullable', 'string'],
            'facebook'          => ['nullable', 'url'],
            'linkedin'          => ['nullable', 'url'],
            'youtube'           => ['nullable', 'url'],
            'instagram'         => ['nullable', 'url']
        ];
    }
}
