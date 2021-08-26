<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function create($id) {
        $order = Order::find($id);
        $products = Product::all();
        return view('orderdetail.create', compact('order', 'products'));
    }

    public function store(Request $request, $id) {
        $this->validate($request, OrderDetail::$rules);
        $order_detail = new OrderDetail([
            'order_id' => $request->input('order_id'),
            'product_id' => $request->input('product_id'),
            'unit' => $request->input('unit')
        ]);
        if ($order_detail->save()) {
            $request->session()->flash('success', __('受注詳細を新規登録しました'));
        } else {
            $request->session()->flash('error', __('受注詳細の新規登録に失敗しました'));
        }

        return redirect()->route('admin.order.show', $id);
    }

    public function edit($id) {
        $order_detail = OrderDetail::find($id);
        $products = Product::all();
        return view('orderdetail.edit', compact('order_detail', 'products'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, OrderDetail::$rules);
        $order_detail = OrderDetail::find($id);
        $order_detail->order_id = $request->input('order_id');
        $order_detail->product_id = $request->input('product_id');
        $order_detail->unit = $request->input('unit');
        if ($order_detail->save()) {
            $request->session()->flash('success', __('受注詳細を更新しました'));
        } else {
            $request->session()->flash('error', __('受注詳細の更新に失敗しました'));
        }

        return redirect()->route('admin.order.show', $order_detail->order_id);
    }
}
