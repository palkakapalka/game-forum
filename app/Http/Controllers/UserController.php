<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFilds = $request->validate([
            'name'=>['required', Rule::unique('users', 'name')],
            'email'=>['required','email',Rule::unique('users', 'email')],
            'password'=>['required','min:6','max:50']
        ]);
        ///////$incomingFilds['password']=bcrypt($incomingFilds['password']);///
        $user = User::create( $incomingFilds);
        auth()->login($user);
        return redirect('/');
    }
    public function login (Request $request) {
        $incomingFilds = $request->validate([
            'loginname'=>'required',
            'loginpassword'=>'required'
        ]);
        if(auth()->attempt(['name' => $incomingFilds['loginname'], 'password'=>$incomingFilds['loginpassword']])){
                $request->session()->regenerate();
        }
        return redirect('/');
    }
    public function logout (Request $request){
        auth()->logout();
        return redirect('/');

    }

}
