<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
  
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
           "email"=>"required|email|unique:users",
           "password"=>"required|min:5",
        //    "Cpassword"=>"required|min:5",
        ];
    }
}
