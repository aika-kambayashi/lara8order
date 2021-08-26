<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $orders = Order::with(['Customer'])->sortable()->simplePaginate(5);
        return view('order.index', compact('orders'));
    }

    public function create() {
        $customers = Customer::all();
        return view('order.create', compact('customers'));
    }

    public function store(Request $request) {
        $this->validate($request, Order::$rules);
        $order = new Order([
            'name' => $request->input('name'),
            'customer_id' => $request->input('customer_id')
        ]);
        if ($order->save()) {
            $request->session()->flash('success', __('受注を新規登録しました'));
        } else {
            $request->session()->flash('error', __('受注の新規登録に失敗しました'));
        }

        return redirect()->route('admin.order.index');
    }

    public function edit($id) {
        $order = Order::find($id);
        $customers = Customer::all();
        return view('order.edit', compact('order', 'customers'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, Order::$rules);
        $order = Order::find($id);
        $columns = array_keys(Order::$rules);
        foreach ($columns as $column) {
            $order->$column = $request->input($column);
        }
        if ($order->save()) {
            $request->session()->flash('success', __('受注を更新しました'));
        } else {
            $request->session()->flash('error', __('受注の更新に失敗しました'));
        }

        return redirect()->route('admin.order.index');
    }

    public function show($id) {
        $order = Order::find($id);
        return view('order.show', compact('order'));
    }
}
