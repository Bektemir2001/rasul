<?php

namespace App\Http\Requests\Admin\Student;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class StoreRequest extends FormRequest
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
