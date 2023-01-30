<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'password'=>'required|confirmed|regex:"^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"',
            'password_confirmation' => 'required_with:password|same:password',
            'terms' => 'accepted',
        ];
    }
}
