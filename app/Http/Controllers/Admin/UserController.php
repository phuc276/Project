<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateRequest;

use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {

        $users = Auth::user();
        $blogs = Blog::all();
        return view('admin.user.profile',compact('users', 'blogs'));
    }

 
    public function update(UpdateRequest $request)
    {
        $userId = Auth::user()->id;

        $user = User::findOrFail($userId);

        $data = $request->all();
        $file = $request->avatar;
        if(!empty($file)){
            $data['avatar'] = $file->getClientOriginalName();
        }
        
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = Auth::user()->password;
        }

// dd($data);

        if ($user->update($data)) {
            if(!$request->hasFile('image')) {
       
                $data['image'] = $product->image;
            }
            if(!empty($file)){
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->route('profile');
        } else {
            return redirect()->route('profile');
        }

    }


    
}
