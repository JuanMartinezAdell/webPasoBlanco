<?php

namespace App\Http\Requests\Article;

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

    public function prepareForValidation()
    {
        if (str($this->slug)->trim() == "")
            $this->merge([
                'slug' => str($this->title)->slug()
            ]);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     **/

    public function rules(): array
    {
        return [
            "title" => "required|min:5|max:255",
            "slug" =>  "required|min:5|max:255|unique:articles,slug," . $this->route("article")->id,
            "date" => "required",
            "description" => "required",
            "text" => "required",
            "posted" => "required",
            "type" => "required",
            "category_id" => "required",
        ];
    }
}
