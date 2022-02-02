<?php

namespace App\Http\Requests\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Traits\Apiresponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Product extends FormRequest
{
    use Apiresponse;
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
            'name' => 'required|max:255',
            'description' => 'required',
            'prize' => ['required','numeric'],
            'stock' => ['required','numeric'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'name is required',
            'description.required' => 'description is required',
            'prize.required' => 'Prize field is required',
         
        ];
    }
    protected function failedValidation(Validator $validator) 
    { 
        $data['errors'] = $validator->errors();
        throw new HttpResponseException($this->error($data));
    }
}
