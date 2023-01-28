<?php

namespace App\Http\Requests\Admin\Lesson;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required',
            'semester_id' => 'required|integer',
            'content' => 'required',
            'image' => 'mimes:jpg,jpeg,bmp,png'
        ];
    }
    public function messages(){
        return [
            'image.mimes' => 'Изображение должен быть в формате jpg,jpeg,bmp или png'
        ];
    }

}
