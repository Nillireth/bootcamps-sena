<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBootcampRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|min:5",  
            "description" => "required",
            "website" => "required",
            "phone" => "required",
            "average_cost" => "numeric",
            "user_id" => "exists:users,id" 
        ];
    }

    /*
    * enviar respuesta en caso de validación fallida
    */

    protected function failedValidation(Validator $v){
        //Lamzar una excepción HttpResponse en caso de errores de validación
        throw new HttpResponseException(response()->json([
                                                            "Success" => false,
                                                            "errors" => $v->errors()
                                                         ] , 422));
    }
}
