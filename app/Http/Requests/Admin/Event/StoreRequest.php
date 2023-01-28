<?php

namespace App\Http\Requests\Admin\Event;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'content' => 'required',
            'image_preview' => 'image|mimes:png,jpg,jpeg,bmp',
        ];
    }

    public function messages(){
        return [
            'image_preview.mimes' => 'изображение должен быть в формате png,jpg,jpeg или bmp',
            'image_preview.image' => 'загружайте изображение',
        ];
    }
}
