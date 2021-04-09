<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.all');
    }

    public function confirm(Order $order)
    {
        if (Auth::user()->sitter && $order->sitter_id == Auth::user()->sitter->id) {
            $order->sitter_confirmed = true;
        } else {
            $order->pet_confirmed = true;
        }

        $order->save();
        return redirect()->back();
    }

    public function delete(Order $order)
    {
        if (Auth::user()->admin) {
            $order->delete();
        }
        return redirect()->back();
    }
}
