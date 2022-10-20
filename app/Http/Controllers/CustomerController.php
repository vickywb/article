<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role_id != 3) {

            return view('login');
        }

        // $user_id = Auth::user()->id;

        // $user = User::with(['articles'])
        //     ->where('user_id', $user_id)
        //     ->orederBy('created_at', 'DESC')
        //     ->pagination('5');

        $user = User::all();

        return view('customer.page', [
            'user' => $user
        ]);
    }

    public function show($name)
    {

        $user = User::where('name', $name)->first();
        return view('customer.page', [
            'user' => $user,
            'articles' => $user->articles
        ]);
    }
}
