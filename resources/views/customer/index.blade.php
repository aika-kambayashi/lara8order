@extends('layouts.default')

@section('title', 'Customer.index')

@include('layouts.menu.admin')

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">{{session('success')}}</div>
@endif
<h1 class="page-header">顧客一覧</h1>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <tr>
        <th scope="col">@sortablelink('id', __('id'))</th>
        <th scope="col">@sortablelink('name', __('name'))</th>
        <th scope="col">@sortablelink('created_at', __('created_at'))</th>
        <th scope="col">@sortablelink('updated_at', __('updated_at'))</th>
        <th scope="col">アクション</th>
    </tr>
    @foreach ($customers as $customer)
    <tr>
        <td>{{$customer->id}}</td>
        <td>{{$customer->name}}</td>
        <td>{{$customer->created_at->format('Y年m月d日H時i分')}}</td>
        <td>{{$customer->updated_at->format('Y年m月d日H時i分')}}</td>
        <td class="actions text-nowrap">
            <a class="btn btn-primary" href="{{route('admin.customer.edit', $customer->id)}}">編集</a>
        </td>
    </tr>
    @endforeach
</table>
<div class="paginator">
    <ul class="pagination justify-content-center">{{$customers->links()}}</ul>
</div>
@endsection