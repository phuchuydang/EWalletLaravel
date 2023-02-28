<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:50',
            'fullname' => 'required|max:50',
            'phone' => 'required|max:13',
            'address' => 'required|max:50',
            'birthday' => 'required',
            'fcard' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bcard' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
