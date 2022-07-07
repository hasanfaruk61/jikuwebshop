@extends('layouts.front')

@section('title', $products->name)

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}">
                    Collections
                </a> /
                <a href="{{ url('category/'.$products->category->slug.'/'.$products->slug) }}">
                    {{ $products->category->name }}
                </a>
                 /
                <a href="{{ url('category/'.$products->category->slug.'/'.$products->slug)}}">
                    {{ $products->name }}
                </a>
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card-shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}"  width="60%" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                        </h2>
                        <hr>
                        <label class="me-3">Alte Preis : <s>{{ $products->originalPrice }}€</s></label>
                        <label class="me-3" style="font-weight: bold">jetzt : {{ $products->sellingPrice }}€</label>
                        <p class="mt-3">
                            {{ $products->description }}
                        </p>
                        <hr>
                        @if($products->quantity > 0)
                            <label class="badge bg-success">In stock</label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="product_id">
                                <label for="Quantity">Quantity :</label>
                                <div class="input-group text-center mb-3" style="width: 130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity " class="form-control qty-input text-center" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <br>
                                @if($products->quantity > 0)
                                    <button type="button" class="btn btn-primary me-3 float-start addToCartBtn">Add to Cart <i class="bi bi-cart-plus"></i> </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




