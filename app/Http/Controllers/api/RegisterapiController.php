<?php

namespace App\Http\Controllers\api;
use Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Authenticationservice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\user\User as UserResource;

class RegisterapiController extends Controller
{
    protected $authService;

    public function __construct(Authenticationservice $authService)
    {
        $this->authService = $authService;
    }

    public function customRegistrationapi(Request $request){
        
        $validator = Validator::make($request->all(), [
             'userName' => 'required|min:4|max:255|unique:users,userName',
             'name' => 'required|max:255|min:3',
             'email' => 'required|email|unique:users|max:255',
             'password' => 'required|min:6|max:255',
         ]);

         if($validator->fails()){
            return $this->Erroresponse($validator->errors(),422);
        }
         $data = $request->all();
         $data['password'] = bcrypt($request->password); 
         $user = User::create($data);
         $success['token'] =  $user->createToken('MyApp')->accessToken;
         $success['name'] =  $user->name;
            
         return $this->Showone(collect($success));
   
     }


     public function Customlogin(Login $request){
        // $validator = Validator::make($request->all(), [
            
        //     'email' => 'required|max:255',
        //     'password' => 'required|max:255',
        // ]);

       
        // if($validator->fails()){
        //     return $this->Erroresponse($validator->errors(),422);
            
        // }
       
        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            
        //     session()->regenerate();
        //     $user = Auth::user(); 
        //      $success['token'] =  $user->createToken($user->firstname .' '. $user->lastname)->accessToken; 
        //      $success['name'] =  $user->name .' '. $user->userName;
        //      return $this->Showone(collect($success));
           
        // }

     
        // return $this->Erroresponse('Your Credential does not match',404);

        $data = $this->authService->login($request);
        if (isset($data['errors'])) {
            return $this->error($data['errors'],404);
        } else {
            $user = $data;
            $data = [
                'user' => new UserResource($user),
                'token' => $data->createToken(config('app.name'))->accessToken,
            ];
            return $this->success($data, 200);
        }
       

    }
}
