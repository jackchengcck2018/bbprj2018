<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CartController extends Controller
{


    public function addToCart() {
        if (Auth::check()) {
            $user = Auth::user();


        } else {
            return "User not logged in";
        }

    }

    public function deleteFromCart() {
        if (Auth::check()) {
            $user = Auth::user();


        } else {
            return "User not logged in";
        }
    }

    public function retrieveCartInfo() {
        if (Auth::check()) {
            $user = Auth::user();


        } else {
            return "User not logged in";
        }
    }
}