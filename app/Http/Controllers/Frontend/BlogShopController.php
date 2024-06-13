<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Blog;
use App\Models\Rate;
use App\Models\Comments;




class BlogShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   


        $blogshop = Blog::paginate(3);


        return view('frontend.blog.blog', compact('blogshop'));

    }


    public function showDetail(Request $request, $id)
    {
        $blogDetail = Blog::findOrFail($id);

        $comments =  Comments::where('id_blog', $id)->get();




        $x = Rate::select(DB::raw('SUM(rate) as tong_rate'))
        ->where('id_blog', '=', $id)
        ->get();

        $y = Rate::where('id_blog', $id)->count();


        $prevBlog = Blog::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextBlog = Blog::where('id', '>', $id)->orderBy('id', 'asc')->first();


        return view('frontend.blog.blog-detail', compact('blogDetail','nextBlog','prevBlog', 'x', 'y', 'comments'));
    }

    public function ajaxBlogDetail(Request $request )
    {
       $rate = $request->rate;
       $idblog = $request->idblog;

       $id_user = Auth::user()->id;

       Rate::create([
        'rate' => $rate,
        'id_blog' => $idblog,
        'id_user' => $id_user,
    ]);


       return response('Dữ liệu đã được thêm thành công', 200);   
   }



   public function comments(Request $request)
   {
       $cmt = $request->cmt;
       $idblog = $request->idblog;   
       $level =  $request->level;

       comments::create([
        'cmt' => $cmt,
        'id_blog' => $idblog,
        'id_user' => $id_user = Auth::user()->id,
        'avatar' => Auth::user()->avatar,
        'name' =>  Auth::user()->name,
        'level' => $level,



    ]);


       return redirect()->route('blog.detail', ['id' => $idblog])->with('success', 'Thành công');   
   }


}





