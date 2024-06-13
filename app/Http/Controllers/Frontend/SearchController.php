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

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = Product::where('name', 'LIKE', '%' . $search . '%')->get();


        return view('frontend.product.searchproduct', compact('products'));
    } // 


    public function showSearchForm()
    {
        return view('frontend.onepage.search-advanced');
    }


    public function searchAdvanced(Request $request)
    {

        if (empty($request->all())) {

            return view('frontend.onepage.search-advanced');
        }

        $query = Product::query();
        // dd($request->all());



        if ($request->has('name') && $request->input('name') !== null) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('price') && $request->input('price') !== null) {
            $price = explode('-', $request->input('price'));
            $minPrice = $price[0];
            $maxPrice = $price[1];
            $query->whereBetween('price', [$minPrice, $maxPrice]);

        }

        if ($request->has('id_category') && $request->input('id_category') !== null) {
            $query->where('id_category', $request->input('id_category'));
        }

        if ($request->has('id_brand') && $request->input('id_brand') !== null) {
            $query->where('id_brand', $request->input('id_brand'));
        }

        if ($request->has('status') && $request->input('status') !== null) {
            $query->where('status', $request->input('status'));
        }

        $products = $query->orderBy('name')->paginate(3);

        return view('frontend.onepage.search-advanced', compact('products'));

    }



}
