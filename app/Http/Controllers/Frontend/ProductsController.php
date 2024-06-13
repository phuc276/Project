<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;


use Image;

class ProductsController extends Controller
{
    /* Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $id = Auth::user()->id;
        $getProducts = Product::where('id_user', $id)->get();


        return view('frontend.product.my-product', compact( 'getProducts'));
    } 
//


    public function add(Request $request)
    {
        $data = $request->all();

        $data['status'] = 1;
        $data['id_user'] = Auth::user()->id; 

        // $sale = $request->input('sale');

        if ($request->input('sale')) {
            $sale = $request->input('sale');
        } else {
            $data['sale'] = 1;
        }



        $img = [];
        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $name = $image->getClientOriginalName();
                $name_2 = "hinh50_".$image->getClientOriginalName();    
                $name_3 = "hinh200_".$image->getClientOriginalName();

                //$image->move('upload/product/', $name);

                $path = public_path('upload/product/' . $name);
                $path2 = public_path('upload/product/' . $name_2);
                $path3 = public_path('upload/product/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(50, 70)->save($path2);
                Image::make($image->getRealPath())->resize(200, 300)->save($path3);

                $img[] = $name;

            }
        }
        $data['image'] = json_encode($img);


        Product::create($data);


        return redirect()->route('addproduct')->with('msg', 'Thêm sản phẩm thành công!');
    }
//

    public function edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->all();
        $saleValue = $request->input('sale');



        if ($saleValue !== null) {
            $product->sale =  $request->input('sale');
        } else {
            $product->sale = $product->sale;
        }



        $file = $request->file('image');

        $images = json_decode($product->image, true);

        $selectedImages = $request->input('selected_images', []);

        foreach ($selectedImages as $selectedImage) {
            $index = array_search($selectedImage, $images);
            if ($index !== false) {
                unset($images[$index]);
            }
        }
        $images = array_values($images);

        if ($request->file('image')) {
            foreach ($request->file('image') as $image) {

                if (count($images) < 3) {
                    $name = $image->getClientOriginalName();
                    $name_2 = "hinh50_".$image->getClientOriginalName();    
                    $name_3 = "hinh200_".$image->getClientOriginalName();


                    $path = public_path('upload/product/' . $name);
                    $path2 = public_path('upload/product/' . $name_2);
                    $path3 = public_path('upload/product/' . $name_3);

                    Image::make($image->getRealPath())->save($path);
                    Image::make($image->getRealPath())->resize(50, 70)->save($path2);
                    Image::make($image->getRealPath())->resize(200, 300)->save($path3);

                    $images[] = $image->getClientOriginalName();
                }
                else {
                    Session::flash('error', 'Bạn chỉ được tải lên tối đa 3 hình ảnh.');
                    return redirect()->back();
                }
            }
        } 

        $product->image = json_encode($images);

        $product->save();
        return view('frontend.product.edit', compact('product'));
    }



//
    public function delete($id)

    {

        $product = Product::find($id);

        $product->delete();  

        return redirect()->route('myproduct');
    }

//

    public function viewproduct()

    {
        if (Auth::check()) {
          $id = Auth::user()->id;

          $latestProducts = Product::where('id_user', $id)
          ->orderBy('created_at', 'desc')
          ->get();

          return view('frontend.onepage.index', compact( 'latestProducts'));  
      }

      $latestProducts = Product::where('id_user', 16)
      ->orderBy('created_at', 'desc')
      ->get();

    return view('frontend.onepage.index', compact('latestProducts'));

    }


    public function productdetail($id)
    {


        $productDetail = Product::findOrFail($id);

        return view('frontend.product.product-details', compact('productDetail'));
    }
//

    public function postCart(Request $request)
    {

        if ($request->id) {
          $cartId = $request->id;
          $array = Session::get('arrayid', []);

      } else {

        return view('frontend.cart.cart');
    }


    foreach ($array as $item) {
        if ($item['id'] == $cartId) {
            return view('frontend.cart.cart');
        }
    }



    $products = Product::where('id', $cartId)->get();
    $array[] = ['id' => $cartId, 'data' => $products, 'quantity' => 1];

    Session::put('arrayid', $array);


    return view('frontend.cart.cart');
}


//
    public function updateCart(Request $request)
    {
        $productId = $request->id;
        $quantity = $request->quantity;

        $array = session('arrayid', []);

        foreach ($array as $key => &$item) {
            if ($item['id'] == $productId) {
                if ($quantity >= 1) {
                    $array[$key]['quantity'] = $quantity;
                } else {
                    unset($array[$key]);
                }
            }

        }

        $products = Product::where('id', array_column($array, 'id'))->get();
        session()->put('arrayid', $array);

        return view('frontend.cart.cart');

    }
//


}


// admin:  them chu admin vao router de phan biet trang admin roi 
// xem bai 3

// - register, bo sung form day du nhu prodfile
// - login: the level, de sau lam phan quyen 

// - sua code trong controller detail blog , rut gon code lai
// - rate: tinh tbc va hien thi ra dung ngoi sao tuong ung 
// - get name router, va kiem tra co chu acount , co thi goi 

// - js viet duoi cung va viet sau thu vien js , neu thu vien js nam duoi thi copy len tren dau

// - add product: ti a giai thich sau

