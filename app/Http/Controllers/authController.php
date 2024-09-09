<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Req;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class authController extends Controller
{
    public function view(){
        return view('login');
    }

    public function login(Req $r){
        $data = [
            "email" => $r->email,
            "password" => $r->password
        ];
        if(Auth::attempt($data)){
            $role = Auth::user()->role;
            switch ($role) {
                case 'admin':
                    return redirect('/admin/home');
                    break;

                case 'kasir':
                    return redirect('/kasir/home');
                    break;

                case 'owner':
                    return redirect('/owner/home');
                    break;
                
                default:
                    return redirect('/login');
                    break;
            }
        }
    }

    public function logout(){
        if(Auth::logout()){
            return redirect('/');
        }
    }
}
