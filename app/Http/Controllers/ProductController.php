<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $products = Product::sortable()->simplePaginate(5);
        return view('product.index', compact('products'));
    }

    public function create() {
        return view('product.create');
    }

    public function store(Request $request) {
        $this->validate($request, Product::$rules);
        $product = new Product([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);
        if ($product->save()) {
            $request->session()->flash('success', __('商品を新規登録しました'));
        } else {
            $request->session()->flash('error', __('商品の新規登録に失敗しました'));
        }

        return redirect()->route('admin.product.index');
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, Product::$rules);
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        if ($product->save()) {
            $request->session()->flash('success', __('商品を更新しました'));
        } else {
            $request->session()->flash('error', __('商品の更新に失敗しました'));
        }

        return redirect()->route('admin.product.index');
    }
}
