<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
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
                'title' => 'required|string|max:70|unique:blogs',
                'description' => 'required|string|max:155',
                'keywords' => 'required|string|max:200',
                'my_content' => 'required',
                'slug' => 'required|string|max:50|unique:blogs',
                'writer_id' => 'required|string|max:10|',
                'category_id' => 'required|string|max:10|',
                'photo' => 'nullable',
            ];
        }

        if ($this->getMethod() === 'PUT') {
            return [
                'title' => ['required', 'string', 'max:70', Rule::unique('blogs')->ignore($this->post->id)],
                'description' => ['required','string','max:155'],
                'keywords' => ['required','string','max:200'],
                'my_content' => ['required'],
                'slug' => ['required','string','max:50', Rule::unique('blogs')->ignore($this->post->id)],
                'category_id' => 'required|string|max:20',
                'writer_id' => 'nullable',
                'photo' => 'nullable',
            ];
        }
    }
}
