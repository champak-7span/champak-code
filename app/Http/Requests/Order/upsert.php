<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\Apiresponse;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class upsert extends FormRequest
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
       $rules = [
           'name' => ['required','max:254'],
           'product_id' =>['required'],
           'quantity' => ['required'],
           'address' => ['required','max:1024']
       ];
       return $rules;
    }

    protected function failedValidation(Validator $validator) 
    { 
        $data['errors'] = $validator->errors();
        throw new HttpResponseException($this->error($data));
    }
  
}
