@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header bg-success">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option value="">Select a Category</option>
                            @foreach($category as $item)
                            <option value="{{ $item->id }}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6" >
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name..">
                    </div>
                    <hr>
                    <div class="col-md-6" >
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" placeholder="slug..">
                    </div>
                    <hr>
                    <div class="col-md-12" >
                        <label for="">Description</label><br>
                        <textarea name="description" id="" cols="90" rows="3"></textarea>
                    </div>
                    <hr>
                    <div class="col-md-12" >

                        <input type="file" class="form-control product-image" name="image" >
                    </div>
                    <hr>
                    <div class="col-md-6 mb-3" >
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" name="originalPrice">
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" name="sellingPrice">
                    </div>
                    <hr>
                    <div class="col-md-3" >
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="quantity">
                    </div>
                    <hr>
                    <div class="col-md-6" >
                        <label for="">status</label>
                        <input type="checkbox"  name="status">
                    </div>

                    <div class="col-md-6" >
                        <label for="">trending</label>
                        <input type="checkbox"  name="trending">
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
