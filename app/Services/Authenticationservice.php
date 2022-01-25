<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authenticationservice{

    protected $user = null;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($inputs = null)
    {
        
         $user = $this->user->where('email', $inputs['email'])->first();
         if(empty($user)){
            $data['errors'] = 'User is not found!';
            return $data;
         }
        if(Auth::attempt(['email' => $inputs['email'], 'password' => $inputs['password']])){ 
            $user = Auth::user();
            return $user;
        }
        $data['errors'] = 'User credential does  not match our records!';
        return $data;
    }

}