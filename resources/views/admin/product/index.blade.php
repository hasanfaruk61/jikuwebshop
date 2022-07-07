@extends('layouts.admin')

@section('content')


    <div class="card">
        <div class="card-header bg-success">
            <h4>Product Page</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->sellingPrice }}</td>

                        <td>
                            <img src="{{ asset('assets/uploads/products/'.$item->image) }}" height="60" width="60" class="product-image">
                        </td>

                        <td>
                            <a href="{{ url('edit-prod/'.$item->id) }}" class=" btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('delete-product/'.$item->id ) }}" class=" btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection