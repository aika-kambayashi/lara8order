@extends('layouts.default')

@section('title', 'OrderDetail.create')

@include('layouts.menu.admin')

@section('content')
<h1 class="page-header">受注詳細登録</h1>
@if (count($errors) > 0)
    <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{route('admin.orderdetail.store', $order->id)}}" method="post">
    @csrf
    <div class="form-group">
        <label for="customer">商品</label>
        <select class="form-control" id="product" name="product_id">
        @foreach ($products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">個数</label>
        <input class="form-control" type="text" name="unit" value="{{old('unit')}}" required>
    </div>
    <input type="hidden" id="order" name="order_id" value="{{$order->id}}" required/>
    <input clas="btn btn-primary" type="submit" value="登録">
</form>
@endsection