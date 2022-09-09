<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        if ($this->getMethod() === 'POST') {
            return [
                'title' => 'required|string|max:100|unique:products',
                'description' => 'required|string|max:500',
                'keywords' => 'required|string|max:200',
                'telephone' => 'required|string|max:70',
                'slug' => 'required|string|max:50|unique:products',
                'photos' => 'required',
            ];
        }

        if ($this->getMethod() === 'PUT') {
            return [
                'title' => ['required', 'string', 'max:100', Rule::unique('products')->ignore($this->product->id)],
                'description' => ['required','string','max:500'],
                'keywords' => ['required','string','max:200'],
                'telephone' => ['required','string','max:70'],
                'slug' => ['required','string','max:50', Rule::unique('products')->ignore($this->product->id)],
            ];
        }
    }
}
