<?php

namespace App\Http\Requests\Main\Male;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class ApplicationRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'phone_number' => 'required|string|max:50',
            'passport_image' => 'required|mimes:jpg,jgeg,bmp,png',
            'certificate_image' => 'required|mimes:jpg,jpeg,bmp,png',
            'type_id' => 'required|integer',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }
    public function messages(){
        Session::flash('notification','ErrorWithApplication');
        return [
            'passport_image.mimes' => 'файл должен быть png, jpg, jpeg, bmp',
            'certificate_image.mimes' => 'файл должен быть png, jpg, jpeg, bmp',
            'type_id.required' => 'Выберите форма обучение',
            'g-recaptcha-response.required' => 'Пожалуйста, подтвердите, что вы не робот',
            'g-recaptcha-response.captcha' => 'Ошибка капчи! повторите попытку позже или обратитесь к администратору сайта'
        ];
    }
}
