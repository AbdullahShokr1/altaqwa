<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
                'user_id' =>'required',
                'product_id' =>'required',
                'comment' =>'nullable|string',
                'review' =>'nullable|max:5|min:1',
            ];
        }

        if ($this->getMethod() === 'PUT') {
            return [
                'user_id' =>'required',
                'product_id' =>'required|',
                'comment' =>'required|string',
                'review' =>'required|min:1',
            ];
        }
    }
}
