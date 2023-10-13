<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:64'],
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'place' => 'required',
            'state' => 'required',
            'delivery' => 'required',
            'open_to_discussion' => 'filled',
        ];
    }
}