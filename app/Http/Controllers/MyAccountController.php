<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function orders()
    {
    $viewData = [];
    $viewData["title"] = "My Orders - Online Store";
    $viewData["subtitle"] = "My Orders";
    $viewData["orders"] = Order::with(['items.product'])->where('user_id', Auth::user()->id)->get();
    return view('myaccount.orders')->with("viewData", $viewData);
    }
}
