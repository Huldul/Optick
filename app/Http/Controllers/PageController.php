<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function MainPage(){
        return view('MainPage');
    }
    public function LoginPage(){
        return view('LoginPage');
    }
    public function CheckPswd(Request $request){
        $post = $request->all();
        $admin = User::find(1);
    
        if($post['email'] == $admin->email and $post['pswd'] == $admin->pswd){
            Auth::login($admin); // Аутентифицируем пользователя
            return redirect('/admin');
        } else {
            return redirect('/login')->with('error', 'Неверные учетные данные');
        }
    }
    

}

