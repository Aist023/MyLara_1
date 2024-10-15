<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\newsUsers;

class UserController extends Controller
{
    public function loginGet(){
        return view('User/login');
    }

    public function loginPost(Request $request){
        $data = $request->all();
        if(isset($data['Login_button']) && $data['Login_button']==='Exit'){return redirect('');}
        elseif(isset($data['Login_button']) && $data['Login_button']==='Login'){
            if((!$data['email'])||(!$data['password'])){return view('User/login',['ErrorCode'=>1]);}
            $User=newsUsers::where('email',$data['email'])->where('password',$data['password'])->first();
            if(!$User){return view('User/login',['ErrorCode'=>2]);}
            setcookie('User',$data['email'],time() + (86400 * 30),'/');
            return redirect('');
        }
        return view('User/login',['ErrorCode'=>3]);
    }

    public function registrGet(){
        return view('User/registr');
    }

    public function registrPost(Request $request){
        $data = $request->all();
        if(isset($data['Registr_button']) && $data['Registr_button']==='Exit'){return redirect('');}
        elseif(isset($data['Registr_button']) && $data['Registr_button']==='Save'){
            if((!$data['email'])||(!$data['password'])||(!$data['repeatPassword'])){return view('User/registr',['ErrorCode'=>1]);}
            if($data['password']!==$data['repeatPassword']){return view('User/registr',['ErrorCode'=>2]);}
            $User=newsUsers::where('email',$data['email'])->first();
            if($User){return view('User/registr',['ErrorCode'=>3]);}
            newsUsers::create([
                'email'=>$data['email'],
                'password'=>$data['password'],
            ]);
            setcookie('User',$data['email'],time() + (86400 * 30),'/');
            return redirect('');
        }
        return view('User/registr',['ErrorCode'=>4]);
    }

    public function Exit(){
        setcookie('User','',time() - 1,'/');
        return redirect('');
    }
}
