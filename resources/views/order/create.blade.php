@extends('layouts.default')

@section('title', 'Order.create')

@include('layouts.menu.admin')

@section('content')
<h1 class="page-header">受注登録</h1>
@if (count($errors) > 0)
    <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{route('admin.order.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">名前</label>
        <input class="form-control" type="text" name="name" value="{{old('name')}}" required>
    </div>
    <div class="form-group">
        <label for="customer">顧客</label>
        <select class="form-control" id="customer" name="customer_id">
        @foreach ($customers as $customer)
            <option value="{{$customer->id}}">{{$customer->name}}</option>
        @endforeach
        </select>
    </div>
    <input clas="btn btn-primary" type="submit" value="登録">
</form>
@endsection