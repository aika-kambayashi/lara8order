<?php

namespace App\Http\Controllers;

use Route;
use Illuminate\Http\Request;

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
        $homeMenus = [];
        $homeMenus['受注一覧'] = route('admin.order.index');
        $homeMenus['受注新規登録'] = route('admin.order.create');
        $homeMenus['商品一覧'] = route('admin.product.index');
        $homeMenus['商品新規登録'] = route('admin.product.create');
        $homeMenus['顧客一覧'] = route('admin.customer.index');
        $homeMenus['顧客新規登録'] = route('admin.customer.create');        
        return view('home', compact('homeMenus'));
    }
}
