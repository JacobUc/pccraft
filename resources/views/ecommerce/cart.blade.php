@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-20">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex space-x-2">
                <li class="breadcrumb-item"><a href="/" class="text-blue-600">Tienda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    {{ $error }}
                    <button type="button" class="close absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="flex justify-center">
            <div class="w-full lg:w-2/3">
                <br>
                @if(\Cart::getTotalQuantity() > 0)
                    <h4 class="text-lg font-semibold">{{ \Cart::getTotalQuantity() }} Producto(s) en el carrito</h4><br>
                @else
                    <h4 class="text-lg font-semibold">No Product(s) In Your Cart</h4><br>
                    <a href="/" class="btn btn-dark bg-gray-800 text-white px-4 py-2 rounded">Continue en la tienda</a>
                @endif

                @foreach($cartCollection as $item)
                    <div class="flex mb-4">
                        <div class="w-1/4">
                            <img src="/images/{{ $item->attributes->image }}" class="img-thumbnail w-full h-auto">
                        </div>
                        <div class="w-1/2 px-4">
                            <p>
                                <b><a href="/shop/{{ $item->attributes->slug }}" class="text-blue-600">{{ $item->name }}</a></b><br>
                                <b>Price: </b>${{ $item->price }}<br>
                                <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>
                            </p>
                        </div>
                        <div class="w-1/4 flex items-center">
                            <div class="flex space-x-2">
                                <form action="{{ route('cart.update') }}" method="POST" class="flex items-center">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="ID_producto" name="ID_producto">
                                    <input type="number" class="form-control form-control-sm w-16 mr-2" value="{{ $item->quantity }}" id="stock" name="stock">
                                    <button class="btn btn-secondary btn-sm bg-gray-600 text-white px-2 py-1 rounded"><i class="fa fa-edit"></i></button>
                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST" class="flex items-center">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="ID_producto" name="ID_producto">
                                    <button class="btn btn-danger btn-sm bg-red-600 text-white px-2 py-1 rounded"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                @endforeach

                @if(count($cartCollection) > 0)
                    <div class="flex justify-end">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            {{ csrf_field() }}
                            <button class="btn btn-secondary btn-md bg-gray-600 text-white px-4 py-2 rounded">Clear Cart</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
