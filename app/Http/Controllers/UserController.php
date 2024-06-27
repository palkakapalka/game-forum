<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function deleteUser(User $user){

            $user->delete();

        return redirect('/admin-users');
    }
    public function updateUser(User $user, Request $request){

        $incomingFields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'userType' => 'required|in:admin,creater,user'
        ]);

        //dd($incomingFields);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['email'] = strip_tags($incomingFields['email']);

        $user->update($incomingFields);
            return redirect('/admin-users');

    }
    public function showEditScreenUser(User $user){

        return view('admin-edit-users',['user' => $user]);

    }

    public function register(Request $request){
        $incomingFilds = $request->validate([
            'name'=>['required', Rule::unique('users', 'name')],
            'email'=>['required','email',Rule::unique('users', 'email')],
            'password'=>['required','min:6','max:50']
        ]);
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

               // $request->session()->regenerate();
                if(auth()->user()->userType === 'admin'){
                    return redirect('admin-post');
                }
        }
        return redirect('/');
    }
    public function logout (Request $request){
        auth()->logout();
        return redirect('/');

    }

}
