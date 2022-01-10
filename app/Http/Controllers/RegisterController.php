<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Redirect;
use Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
      
    }

    public function index(Request $request){

        return view('register.register');

    }

    public function customRegistration(Request $request){
        
       $request->validate([
            'userName' => 'required|min:4|max:255|unique:users,userName',
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|max:255',
        ]);
         

      
        $data = $request->all();
        $data['password'] = bcrypt($request->password); 

        $check = User::create($data);
         
        return redirect("/posts")->with('success','You have signed-in successfully');
    }

    public function Logincreate(){

        return view('register.login');
    }

    public function Loginstore(Request $request){
        $attribute = $request->validate([
            
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
       
        if(auth()->attempt($attribute)){
            session()->regenerate();
            return redirect('/posts')->with('success','Login successfully!');
        }

     
        return Redirect::back()->with('danger', 'Your credential are does not match!');
       

    }

    public function Logout(){
            
        Auth::Logout();
        return redirect('/')->with('success','Logout successfully!');

    }

}
