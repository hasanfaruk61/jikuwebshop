@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header bg-primary">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option value="">{{ $products->category->name }}</option>
                        </select>
                    </div>

                    <div class="col-md-6" >
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" value="{{ $products->name }}" name="name" >
                    </div>
                    <hr>
                    <div class="col-md-6" >
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{ $products->slug }}" name="slug">
                    </div>
                    <hr>

                    <div class="col-md-12" >
                        <label for="">Description</label><br>
                        <textarea name="description" id="" cols="90" rows="3" >{{ $products->description }}</textarea>
                    </div>
                    <hr>
                    <div class="col-md-6 mb-3" >
                        <label for="">Original Price</label>
                        <input type="number" value="{{ $products->originalPrice }}" class="form-control" name="originalPrice">
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Selling Price</label>
                        <input type="number" value="{{ $products->originalPrice }}" class="form-control" name="sellingPrice">
                    </div>
                    <hr>
                    @if($products->image)
                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="">
                    @endif
                    <div class="col-md-12" >
                        <input type="file" class="form-control product-image" name="image" >
                    </div>
                    <hr>
                    <div class="col-md-6 mb-3" >
                        <label for="">status</label>
                        <input type="checkbox"  {{ $products->status == "1" ? 'checked' : '' }} name="status">
                    </div>
                    <hr>
                    <div class="col-md-6 mb-3" >
                        <label for="">trending</label>
                        <input type="checkbox"  {{ $products->trending  == "1" ? 'checked' : '' }}  name="trending">
                    </div>
                    <hr>
                    <div class="col-md-6 mb-3" >
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" value="{{ $products->originalPrice }}" name="originalPrice">
                    </div>
                    <div class="col-md-6" >
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{ $products->sellingPrice }}"  name="sellingPrice">
                    </div>
                    <hr>
                    <div class="col-md-3" >
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="quantity">
                    </div>
                    <hr>
                    <div class="col-md-12" >
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>

                </div>
            </form>

        </div>
    </div>

@endsection
