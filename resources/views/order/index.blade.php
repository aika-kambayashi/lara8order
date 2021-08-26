@extends('layouts.default')

@section('title', 'Order.index')

@include('layouts.menu.admin')

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">{{session('success')}}</div>
@endif
<h1 class="page-header">受注一覧</h1>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <tr>
        <th scope="col">{{__('id')}}</th>
        <th scope="col">{{__('name')}}</th>
        <th scope="col">顧客名</th>
        <th scope="col">{{__('created_at')}}</th>
        <th scope="col">{{__('updated_at')}}</th>
        <th scope="col">アクション</th>
    </tr>
    @foreach ($orders as $order)
    <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->name}}</td>
        <td>{{$order->Customer->name}}</td>
        <td>{{$order->created_at->format('Y年m月d日H時i分')}}</td>
        <td>{{$order->updated_at->format('Y年m月d日H時i分')}}</td>
        <td class="actions text-nowrap">
            <a class="btn btn-primary" href="{{route('admin.order.show', $order->id)}}">表示</a>
        </td>
    </tr>
    @endforeach
</table>
<div class="paginator">
    <ul class="pagination justify-content-center">{{$orders->links()}}</ul>
</div>
@endsection