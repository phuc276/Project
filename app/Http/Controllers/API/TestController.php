<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use App\Models\Product;


use Illuminate\Support\Facades\Auth;

use App\Http\Requests\admin\BlogRequest;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Http\JsonResponse;

use App\Http\Requests\API\LoginRequest;

use Validator;
// use Auth;
use App\Models\comment;



class TestController extends Controller
{

    public $successStatus = 200;
    public function list()
    {

        $getBlogListComment = Blog::paginate(3);

        // dd($getBlogListComment);
        // co dc 1 arr: 

        // frontend: reactjs
        // return view("xxx", compact('getBlogListComment'))

        // ajax
        return response()->json([
            'blog' => $getBlogListComment
        ]);

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
            $user = Auth::user(); 
            $token = $user->createToken('authToken')->plainTextToken;
            // $success['token'] =  $user->createToken('MyApp')->accessToken; 


            return response()->json([
                'success' => 'success',
                'token' => $token, 
                'Auth' => Auth::user()
            ], 
            $this->successStatus
        ); 
        } else {
            return response()->json([
                'response' => 'error',
                'errors' => ['errors' => 'invalid email or password'],
            ],
            $this->successStatus); 
        }


    } //



    public function pagingBlogDetail(Request $request, $id) {

        $blog = Blog::find($id); 
        $previous = Blog::where('id', '<', $blog->id)->max('id');
        $next = Blog::where('id', '>', $blog->id)->min('id');

        if($blog){
            return response()->json([
                'status' => 200,
                'data' => $blog,
                'previous' => $previous,
                'next' => $next
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'error'
            ]);
        }

    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Sản phẩm đã được xóa thành công'], 200);
    }

    
    // get all rate with id



}
