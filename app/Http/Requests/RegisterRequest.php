<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Session;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'g-recaptcha-response' => 'required|captcha',

        ];
    }

    public function messages(){
        Session::flash('notification','ErrrorWithRegistration');
        return [
                'email.unique' => 'Этот аккаунт уже существует',
                'password.min' => 'Пароль должен быть не менее 8 символов',
                'g-recaptcha-response.required' => 'Пожалуйста, подтвердите, что вы не робот',
                'g-recaptcha-response.captcha' => 'Ошибка капчи! повторите попытку позже или обратитесь к администратору сайта'
            ];
    }
}
