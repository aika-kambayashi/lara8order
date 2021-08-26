@extends('layouts.default')

@section('title', 'Order.show')

@include('layouts.menu.admin')

@section('content')
<h1 class="page-header">受注表示</h1>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <tr>
        <th scope="col">{{__('id')}}</th>
        <th scope="col">{{__('name')}}</th>
        <th scope="col">顧客名</th>
        <th scope="col">{{__('created_at')}}</th>
        <th scope="col">{{__('updated_at')}}</th>
    </tr>
    <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->name}}</td>
        <td>{{$order->Customer->name}}</td>
        <td>{{$order->created_at->format('Y年m月d日H時i分')}}</td>
        <td>{{$order->updated_at->format('Y年m月d日H時i分')}}</td>
    </tr>
</table>
<p align="center">
    <a class="btn btn-primary" href="{{route('admin.order.edit', $order->id)}}">受注編集</a>
</p>

@if (!empty($order->order_details))
<h1>受注詳細表示</h1>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <tr>
        <th>id</th>
        <th>商品名</th>
        <th>金額</th>
        <th>個数</th>
        <th>小計</th>
        <th>アクション</th>
    </tr>
    @foreach ($order->order_details as $order_detail)
    <tr>
        <td>{{$order_detail->id}}</td>
        <td>{{$order_detail->Product->name}}</td>
        <td>{{$order_detail->Product->price}}</td>
        <td>{{$order_detail->unit}}</td>
        <td>{{$order_detail->Product->price * $order_detail->unit}}</td>
        <td class="actions text-nowrap">
            <a class="btn btn-primary" href="{{route('admin.orderdetail.edit', $order_detail->id)}}">編集</a>
        </td>
    </tr>
    @endforeach
</table>
@endif
<p align="center">
    <a class="btn btn-primary" href="{{route('admin.orderdetail.create', $order->id)}}">受注詳細新規追加</a>
</p>
@endsection