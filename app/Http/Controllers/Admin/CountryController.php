<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CountryRequest;


use App\Models\Country;

use DB;


class CountryController extends Controller
{
    public function index()
    {
        $country = Country::all();
        return view('admin.user.country', compact('country'));
    }

    public function add(CountryRequest $request)
    {
        $data = $request->all();

        $country = new Country;

        $country->title = $data['title'];



        $country->save();

        return redirect()->route('country');
    }



    public function delete($id)

    {

        $Country = Country::find($id);

        $Country->delete();  
     
    

        return redirect()->route('country');
    }
}
