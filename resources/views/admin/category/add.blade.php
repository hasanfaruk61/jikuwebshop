@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header bg-success">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <hr>
                <div class="row">
                    <div class="col-md-6" >
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name..">
                    </div>
                    <hr>
                    <div class="col-md-6" >
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" placeholder="slug..">
                    </div>
                    <hr>
                    <div class="col-md-6 mb-3" >
                        <label for="">Status</label>
                        <input type="checkbox" name="status" >
                    </div>
                    <hr>
                    <div class="col-md-6 mb-3" >
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular">
                    </div>
                    <hr>
                    <div class="col-md-6" >
                        <input type="file" class="form-control" name="image">
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
