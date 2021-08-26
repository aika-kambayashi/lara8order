@extends('layouts.default')

@section('title', 'OrderDetail.edit')

@include('layouts.menu.admin')

@section('content')
<h1 class="page-header">受注詳細編集</h1>
@if (count($errors) > 0)
    <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{route('admin.orderdetail.update', $order_detail->id)}}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="product">商品</label>
        <select class="form-control" id="product" name="product_id">
        @foreach ($products as $product)
            <option value="{{$product->id}}"{{$product->id == old('product_id', $order_detail->product_id) ? 'selected': ''}}>{{$product->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="unit">個数</label>
        <input class="form-control" type="text" name="unit" value="{{old('unit', $order_detail->unit)}}">
    </div>
    <input type="hidden" id="order" name="order_id" value="{{$order_detail->order_id}}" required/>
    <input class="btn btn-primary" type="submit" value="登録">
</form>
@endsection