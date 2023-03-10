<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class HomeSliderRequest extends FormRequest
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
            'order'         => 'nullable',
        ];

        if (!$this->id) 
            $args['image'] = 'required|mimes:jpeg,bmp,png|nullable';
        else
            $args['image'] = 'mimes:jpeg,bmp,png|nullable'; 
        
        return $args;
    }

    public function messages()
    {
        return [
            'image.required' => 'Imagen es requerida',
            'image.mimes'    => 'Solo se aceptan imágenes en formato jpeg,bmp y png',
        ];
    }
}
