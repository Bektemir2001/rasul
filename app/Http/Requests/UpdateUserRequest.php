<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateUserRequest extends FormRequest
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
        // dd($this);
        $user = User::where('id', $this->id)->get();
        if($this->email === $user[0]->email){
            return [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
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
                'address' => '',
                'age' => '',
                'content' => '',
                'image' => 'mimes:jpg,bmp,png,jpeg',
            ];
        }

    }
}
