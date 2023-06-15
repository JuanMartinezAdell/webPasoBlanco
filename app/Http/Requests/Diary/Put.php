<?php

namespace App\Http\Requests\Diary;

use Illuminate\Foundation\Http\FormRequest;

class Put extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => "required | min:5 | max:255",
            'address' => "min:5| max:50",
            'group' => "required",
            'phone' => " max:15",
            'email' => "required | min:5 | max:50 | unique:users,email," . $this->route("user")->id,
            'description' => " max:255",
        ];
    }
}
