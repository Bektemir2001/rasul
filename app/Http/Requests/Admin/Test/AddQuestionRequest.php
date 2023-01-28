<?php

namespace App\Http\Requests\Admin\Test;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class AddQuestionRequest extends FormRequest
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
            'question' => 'required|string',
            'first_answer' => 'required|string',
            'second_answer' => 'required|string',
            'third_answer' => 'required|string',
            'right_answer' => 'required|integer',
            'score' => 'required|integer'
        ];
    }
    public function messages(){
        Session::flash('ErrorWithAddQuestion', 'ErrorWithAddQuestion');
        return [
            'question.required' => 'пожалуйста, заполните это поле',
            'first_answer.required' => 'пожалуйста, заполните это поле',
            'second_answer.required' => 'пожалуйста, заполните это поле',
            'third_answer.required' => 'пожалуйста, заполните это поле',
            'right_answer.required' => 'пожалуйста, выберите парвильный ответ',
            'score.required' => 'пожалуйста, заполните это поле',
            'score.integer' => 'пожалуйста, пишите число'
        ];
    }
}
