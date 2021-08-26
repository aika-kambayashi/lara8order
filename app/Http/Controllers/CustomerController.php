<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $customers = Customer::sortable()->simplePaginate(5);
        return view('customer.index', compact('customers'));
    }

    public function create() {
        return view('customer.create');
    }

    public function store(Request $request) {
        $this->validate($request, Customer::$rules);
        $customer = new Customer([
            'name' => $request->input('name'),
        ]);
        if ($customer->save()) {
            $request->session()->flash('success', __('顧客を新規登録しました'));
        } else {
            $request->session()->flash('error', __('顧客の新規登録に失敗しました'));
        }

        return redirect()->route('admin.customer.index');
    }

    public function edit($id) {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request$request, $id) {
        $this->validate($request, Customer::$rules);
        $customer = Customer::find($id);
        $customer->name = $request->input('name');
        if ($customer->save()) {
            $request->session()->flash('success', __('顧客を更新しました'));
        } else {
            $request->session()->flash('error', __('顧客の更新に失敗しました'));
        }

        return redirect()->route('admin.customer.index');
    }
}
