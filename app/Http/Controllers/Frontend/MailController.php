<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Mail;
use App\Models\User;
use App\Models\History;
use App\Mail\MailNotify;



class MailController extends Controller
{
    public function index(Request $request)
    {

        $array = session('arrayid');
        $totalPrice = $request->input('totalPrice');


        if (Auth::check()) {
            History::create([
                'email' => Auth::user()->email,
                'phone' =>Auth::user()->phone,
                'id_user' =>Auth::user()->id,
                'name' => Auth::user()->name,
                'price' => $totalPrice,
            ]);

        } else {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            $user = User::create($validatedData);

            History::create([
                'email' =>$user->email,
                'phone' =>$user->phone,
                'id_user' =>$user->id,
                'name' => $user->name,
                'price' => $totalPrice,
            ]);

        }

        $data = [
            'subject' => 'Cambo Tutorial Mail',
            'body' => [],
            'total' => $totalPrice,
        ];

        foreach ($array as $item) {
            foreach ($item['data'] as $product) {
                $data['body'][] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $item['quantity'],

                ];
            }
        }

        try {
            Mail::to( Auth::user()->email ?? $user->email)->send(new MailNotify($data));
            Session::forget('arrayid');

            return redirect('user/home')->with('success', 'Order đã được gửi đến Email và giỏ hàng đã được cap nhat');;
        } catch (Exception $th) {
         
            return response()->json(['Sorry']); 
        }
    }
}


