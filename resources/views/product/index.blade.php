@extends('layouts.default')

@section('title', 'Product.index')

@include('layouts.menu.admin')

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">{{session('success')}}</div>
@endif
<h1 class="page-header">商品一覧</h1>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <tr>
        <th scope="col">@sortablelink('id', __('id'))</th>
        <th scope="col">@sortablelink('name', __('name'))</th>
        <th scope="col">@sortablelink('price', __('price'))</th>
        <th scope="col">@sortablelink('created_at', __('created_at'))</th>
        <th scope="col">@sortablelink('updated_at', __('updated_at'))</th>
        <th scope="col">アクション</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->created_at->format('Y年m月d日H時i分')}}</td>
        <td>{{$product->updated_at->format('Y年m月d日H時i分')}}</td>
        <td class="actions text-nowrap">
            <a class="btn btn-primary" href="{{route('admin.product.edit', $product->id)}}">編集</a>
        </td>
    </tr>
    @endforeach
</table>
<div class="paginator">
    <ul class="pagination justify-content-center">{{$products->links()}}</ul>
</div>
@endsection