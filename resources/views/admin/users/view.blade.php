@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>User Details</h4>
                        <a href="{{ url('users') }}" class="btn btn-primary float-end">Zurück</a>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="">Role</label>
                                <div class="p-2 border">{{ $users->role_as == '0'? 'User':'Admin'}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Vorname</label>
                                <div class="p-2 border">{{ $users->name }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Nachname</label>
                                <div class="p-2 border">{{ $users->lname }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Email</label>
                                <div class="p-2 border">{{ $users->email }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Phone</label>
                                <div class="p-2 border">{{ $users->phone }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Address 1</label>
                                <div class="p-2 border">{{ $users->address1 }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Address 2</label>
                                <div class="p-2 border">{{ $users->address2 }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Stadt</label>
                                <div class="p-2 border">{{ $users->city }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Land</label>
                                <div class="p-2 border">{{ $users->country }}</div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
