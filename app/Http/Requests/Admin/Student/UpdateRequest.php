<?php

namespace App\Http\Requests\Admin\Student;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateRequest extends FormRequest
{
    // use User;
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
        $user = User::where('id', $this->id)->get();
        if($this->email === $user[0]->email){
            return [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'type_id' => 'required|integer',
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
                'type_id' => 'required|integer',
                'address' => '',
                'age' => '',
                'content' => '',
                'image' => 'mimes:jpg,bmp,png,jpeg',
            ];
        }

    }
}
