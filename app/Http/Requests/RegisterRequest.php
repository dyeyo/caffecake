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
      'name' => 'required',
      'mobile' => 'required',
      'email' => 'required|unique:User',
      'password' => 'required',
      'lastname' => 'required',
      'numIndentificate' => 'required',
      'terminos' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Este campo en Obligatorio',
      'lastname.required' => 'Este campo en Obligatorio',
      'mobile.required' => 'Este campo en Obligatorio',
      'password.required' => 'Este campo en Obligatorio',
      'email.required' => 'Este campo en Obligatorio',
      'numIndentificate.required' => 'Este campo en Obligatorio',
      'terminos.required' => 'Este campo en Obligatorio',
      'email.unique' => 'Este correo ya existe en nuesta base de datos, prueba otro',
    ];
  }
}
