<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class FeedbackRequest extends FormRequest
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
            'email' => 'required|email',
            'title' => '',
            'phone_number',
            'surname' => '',
            'message' => '',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }
    public function messages(){
        Session::flash('notification','ErrorWithApplication');
        return [
            'g-recaptcha-response.required' => 'Пожалуйста, подтвердите, что вы не робот',
            'g-recaptcha-response.captcha' => 'Ошибка капчи! повторите попытку позже или обратитесь к администратору сайта'
        ];
    }
}
