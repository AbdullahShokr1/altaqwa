<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingsRequest extends FormRequest
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
                'logo' => ['nullable'],
                'name' => ['required','string','max:70'],
                'description' => ['required','string','max:155'],
                'social' => ['required'],
                'photo' => ['nullable'],
            ];
        }
        if ($this->getMethod() === 'PUT') {
            return [
                'logo' => ['nullable'],
                'name' => ['required','string','max:70'],
                'description' => ['required','string','max:155'],
                'social' => ['required'],
                'photo' => ['nullable'],
            ];
        }
    }
}
