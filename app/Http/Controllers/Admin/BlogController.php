<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;

use DB;

use App\Models\Blog;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       

        $blogitem = Blog::paginate(3);


        return view('admin.blog.listblog', compact('blogitem'));
    }

   
     */
    public function create(BlogRequest $request)
    {
        $data = $request->all();

        Blog::create($data);

   
        return redirect()->route('listblog');

    }

    public function indexEdit($id)
    {
        $blogitems = Blog::findOrFail($id);
        return view('admin.blog.editblog', compact('blogitems'));
    }

    public function Edit($id, Request $request)
    {
        $bloger = Blog::findOrFail($id);

        $data = $request->all();

        $file = $request->image;

        if (!empty($file)) {
            $data['image'] = $request->image;;
        } else {
      
            $data['image'] = $bloger->image;
        }

        $bloger->update($data);

        return redirect()->route('listblog');
    }


    public function delete($id)

    {

        $Bloger = Blog::find($id);

        $Bloger->delete();  
     // $destroy = Blog::destroy($id);

    

        return redirect()->route('listblog');
    }







}
