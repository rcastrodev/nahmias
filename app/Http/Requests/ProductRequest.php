<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $args = [];

        if($this->isMethod('post')){
            $args['name'] = 'unique:products|required';
        }
        
        if($this->id){
            $product = Product::find($this->id);
            $args['name'] = ['required', Rule::unique('products')->ignore($product)];
        }
            
        return $args;
    }

    public function messages()
    {
        return [
            'name.required'         => 'Nombre es requerido',
            'name.unique'           => 'El producto ya se encuentra registrado',
        ];
    }
}
