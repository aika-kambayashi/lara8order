@extends('layouts.default')

@section('title', 'Order.edit2')

@section('script')
<script type="text/javascript" src="{{asset('js/admin_order.js')}}"></script>
@endsection

@include('layouts.menu.admin')

@section('content')
<h1 class="page-header">受注編集</h1>
@if (count($errors) > 0)
    <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{route('admin.order.update2', $order->id)}}" method="post" id="orderEdit">
    @csrf
    <div class="form-group">
        <label for="name">名前</label>
        <input class="form-control" type="text" name="name" value="{{old('name', $order->name)}}" required>
    </div>
    <div class="form-group">
        <label for="customer">顧客</label>
        <select class="form-control" id="customer" name="customer_id">
        @foreach ($customers as $customer)
            <option value="{{$customer->id}}"{{$customer->id == old('customer_id', $order->customer_id) ? 'selected': ''}}>{{$customer->name}}</option>
        @endforeach
        </select>
    </div>
    <input class="btn btn-primary" type="button" value="登録" id="adminOrderEdit2Button">
    <input type="hidden" name="id" value="{{$order->id}}">
</form>
<h2 class="mt-3">youtube</h2>
<iframe width="560" height="315" src="https://www.youtube.com/embed/r4SdiT7mm7Y?list=RDr4SdiT7mm7Y" frameborder="0" allowfullscreen></iframe>
@endsection