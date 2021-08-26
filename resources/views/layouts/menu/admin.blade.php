@section('menu')

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <div class="navbar-header">
            <a href="{{route('admin.user.index')}}" class="navbar-brand">受注くん</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{__('Toggle navigation')}}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collpase navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">受注</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin.order.index')}}" class="nav-link">一覧</a></li>
                        <li><a href="{{route('admin.order.create')}}" class="nav-link">新規作成</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">商品</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin.product.index')}}" class="nav-link">一覧</a></li>
                        <li><a href="{{route('admin.product.create')}}" class="nav-link">新規作成</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">顧客</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin.customer.index')}}" class="nav-link">一覧</a></li>
                        <li><a href="{{route('admin.customer.create')}}" class="nav-link">新規作成</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="navbar-text mr-3">ようこそ、{{Auth::user()->name}}</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">管理</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin.user.index')}}" class="nav-link">ユーザ一覧</a></li>
                        <li><a href="{{route('admin.user.edit')}}" class="nav-link">ユーザ編集</a></li>
                        <li><a href="{{route('logout')}}" class="nav-link">ログアウト</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endsection