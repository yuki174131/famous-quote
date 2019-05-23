<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        return [
            'name' => 'required|max:191',
            'content' => 'required|max:500',
        ];
    }
    
    public function messages()
    {
        return[
            'name.required' => '人物は必須です。',
            'content.required' => '名言の入力は必須です。',
        ];
    }
}
