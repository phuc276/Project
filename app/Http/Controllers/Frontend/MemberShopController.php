<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Session;

use App\Models\User;



use Illuminate\Support\Facades\Auth;


use DB;


class MemberShopController extends Controller
{

    public function registerindex()
    {
        return view('frontend.member.register');
    }


    public function register(RegisterRequest $request)
    {
       $data = $request->all();


       $data['password'] = bcrypt($data['password']);


       User::create($data);

       return redirect()->route('registershop')->with('msg', 'Đăng ký người dùng thành công ! ' );


   }

   public function loginindex(){

       return view('frontend.member.login');
   }

   public function login(LoginRequest $request){

    $login = [
        'email' => $request->email,
        'password' => $request->password,
        'level' => 0,


    ];

    $remember = false;

    if ($request->remember_me) {
        $remember = true;

    }

    if ( Auth::attempt($login, $remember)) {
        return redirect('user/home');
    } else {
        return redirect()->back()->withErrors('Email hoặc password không chính xác');
    }


}

public function logout(Request $request) {
    Auth::logout();
    Session::flush();
    return redirect('/user/login');
}

public function updateuser(Request $request) {

   $userId = Auth::user()->id;

   $user = User::findOrFail($userId);

   $data = $request->all();
   $file = $request->file('avatar');

   if(!empty($file)){
    $data['avatar'] = $file->getClientOriginalName();
}

if ($data['password']) {
    $data['password'] = bcrypt($data['password']);
}else{
    $data['password'] = Auth::user()->password;
}



if ($user->update($data)) {

    if(!empty($file)){


        $file->move('upload/user/avatar', $file->getClientOriginalName());

    }
    return redirect()->route('account');
} else {
    return redirect()->route('account');
}
}



}
