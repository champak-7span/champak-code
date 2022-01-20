<?php

namespace App\Http\Requests\Auth;
use App\Traits\Apiresponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;



class Login extends FormRequest
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
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ];
    }

        public function messages()
    {
        return [
            'email.required' => 'email is required',
            'password.required' => 'password is required',
        ];
    }

    protected function failedValidation(Validator $validator) 
    { 
        $data['errors'] = $validator->errors();
        throw new HttpResponseException($this->error($data));
    }
}
