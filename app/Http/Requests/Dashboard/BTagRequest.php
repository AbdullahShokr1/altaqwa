<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BTagRequest extends FormRequest
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
                'title' => 'required|string|max:70|unique:b_tags',
                'description' => 'required|string|max:173',
                'slug' => 'required|string|max:50|unique:b_tags',
            ];
        }

        if ($this->getMethod() === 'PUT') {
            return [
                'title' => ['required', 'string', 'max:70', Rule::unique('b_tags')->ignore($this->tag->id)],
                'description' => ['required', 'string', 'max:173'],
                'slug' => ['required', 'string', 'max:50', Rule::unique('b_tags')->ignore($this->tag->id)],
            ];
        }
    }
}
