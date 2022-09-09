<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
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
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'comment' =>'required|string',
                'post_id' =>'required',
            ];
        }

        if ($this->getMethod() === 'PUT') {
            return [
                'name' => 'required|string|max:255',
                'email' => ['required', 'email', 'max:255'],
                'comment' =>'required|string',
                'post_id' =>'required|',
            ];
        }
    }
}
