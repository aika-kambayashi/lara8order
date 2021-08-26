@extends('layouts.default')

@section('title', 'Product.create')

@include('layouts.menu.admin')

@section('content')
<h1 class="page-header">商品登録</h1>
@if (count($errors) >0)
    <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{route('admin.product.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">名前</label>
        <input class="form-control" type="text" name="name" value="{{old('name')}}" required>
    </div>
    <div class="form-group">
        <label for="price">価格</label>
        <input class="form-control" type="text" name="price" value="{{old('price')}}" required>
    </div>
    <input clas="btn btn-primary" type="submit" value="登録">
</form>
@endsection