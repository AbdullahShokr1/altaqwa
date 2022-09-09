<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
                'email' => 'required|email|max:255|unique:admins',
                'password' => 'required|min:6',
                'photo' => 'nullable',
            ];
        }

        if ($this->getMethod() === 'PUT') {
            return [
                'name' => 'required|string|max:255',
                'email' => ['required', 'email', 'max:255', Rule::unique('admins')->ignore($this->admin->id)],
                'password' => 'nullable|min:6',
                'photo' =>  ['nullable'],
            ];
        }
    }
}
