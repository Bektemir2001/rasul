<?php

namespace App\Http\Requests\Admin\Moderator;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this);
        $user = User::where('id', $this->id)->get();
        if($this->email === $user[0]->email){
            return [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'gender' => 'required|string',
                'address' => '',
                'age' => '',
                'content' => '',
                'image' => 'mimes:jpg,bmp,png,jpeg',
            ];
        }
        else{
            return [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'gender' => 'required|string',
                'address' => '',
                'age' => '',
                'content' => '',
                'image' => 'mimes:jpg,bmp,png,jpeg',
            ];
        }

    }

    public function messages(){
        return [
                'email.unique' => 'Этот аккаунт уже существует',
                'gender.min' => 'Выберите пол',
                'image.mimes' => 'Изображение должен быть в формате jpg,jpeg,bmp или png',
            ];
    }
}
