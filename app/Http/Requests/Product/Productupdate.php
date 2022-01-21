<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Traits\Apiresponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Productupdate extends FormRequest
{
   use Apiresponse;
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
            'name' => 'required|max:255',
            'description' => 'required',
            'updatedby' => 'required|numeric',Rule::exists('users', 'id'),
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'name is required',
            'description.required' => 'description is required',
         
        ];
    }
    protected function failedValidation(Validator $validator) 
    { 
        $data['errors'] = $validator->errors();
        throw new HttpResponseException($this->error($data));
    }
}
