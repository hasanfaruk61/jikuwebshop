@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header bg-success">
            <h4>Edit/Update Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6" >
                        <label for="">Category Name</label>
                        <input type="text" value="{{ $category->name }}" class="form-control" name="name" placeholder="name..">
                    </div>
                    <hr>
                    <div class="col-md-6" >
                        <label for="">Slug</label>
                        <input type="text" value="{{ $category->slug }}" class="form-control" name="slug" placeholder="slug..">
                    </div>
                    <hr>
                    <hr>
                    <div class="col-md-6 mb-3" >
                        <label for="">Status</label>
                        <input type="checkbox" {{ $category->status == "1" ? 'checked' : '' }} name="status" >
                    </div>
                    <hr>
                    <div class="col-md-6 mb-3" >
                        <label for="">Popular</label>
                        <input type="checkbox"  {{ $category->popular == "1" ? 'checked' : '' }}  name="popular">
                    </div>
                    <hr>
                    @if($category->image)
                        <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="">
                    @endif
                    <div class="col-md-12" >
                        <input type="file" class="form-control category-image" name="image" >
                    </div>

                    <div class="col-md-12" >

                        <button type="submit" class="btn btn-primary" >update</button>
                    </div>

                </div>
            </form>

        </div>
    </div>

@endsection
