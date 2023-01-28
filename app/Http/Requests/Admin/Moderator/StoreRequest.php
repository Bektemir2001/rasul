<?php

namespace App\Http\Requests\Admin\Moderator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

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
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'gender' => 'required|string|min:2',
            'address' => '',
            'age' => '',
            'content' => '',
            'image' => 'mimes:jpg,bmp,png,jpeg',

        ];
    }

    public function messages()
    {
        return [
                'email.unique' => 'Этот аккаунт уже существует',
                'password.min' => 'Пароль должен быть не менее 8 символов',
                'gender.min' => 'Выберите пол',
                'image.mimes' => 'Изображение должен быть в формате jpg,jpeg,bmp или png',
            ];
    }
}
