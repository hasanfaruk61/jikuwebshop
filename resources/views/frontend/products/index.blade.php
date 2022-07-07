@extends('layouts.front')

@section('title')
    {{ $category->name }}
@endsection

@section('content')


    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <a href="{{ url('category') }}">
                Collections
            </a> /
            <a href="">{{ $category->name }}</a>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }}</h2>
                    @foreach($products as $product)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <a href="{{ url('category/'.$category->slug.'/'.$product->slug) }}">
                                <img src="{{ asset('assets/uploads/products/'.$product->image) }}" height="140" width="120" alt="Product-image">
                                <div class="card-body">
                                    <h5>{{ $product->name }}</h5>
                                    <span class="float-start">{{ $product->sellingPrice }}€</span>
                                    <span class="float-end"><s>{{ $product->originalPrice }}€</s></span>
                                </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

            </div>
        </div>
    </div>
@endsection
