<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Transaction;
use App\Store;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::count();
        $users = User::where('position', '2')->count();
        $stock_in = Transaction::where('status', 'Stock in')->count();
        $stock_out = Transaction::where('status', 'Stock out')->count();
        $corrupt_material = Transaction::where('status', 'Corrupt Material')->count();
        $stores = Store::count();
        return view('home',
        [
            'products'=> $products,
            'users'=> $users,
            'stock_in'=>$stock_in,
            'stock_out'=>$stock_out,
            'corrupt_material'=>$corrupt_material,
            'stores'=>$stores

            ]);

    }

}
