<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $args = [
            'name'  => 'required',
        ];

        if(! $this->id)
            $args['image'] = 'required|mimes:jpeg,bmp,png';
        else
            $args['image'] = 'mimes:jpeg,bmp,png';

        return $args;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre es requerido',
            'image.required' => 'Icono es requerido',
            'image.mimes'    => 'Solo se aceptan imágenes en formato jpeg,bmp y png',
        ];
    }
}
