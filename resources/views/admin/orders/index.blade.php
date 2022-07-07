@extends('layouts.admin')
@section('title')
    Orders
@endsection

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-success">
                            <h4>New Orders
                                <a href="{{ 'order-history' }}" class="btn btn-warning float-end">Order History</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Bestelldatum</th>
                                    <th>Gesamt Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $item)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->total_price }}€</td>
                                        <td>{{ $item->status == '0' ?'pending' : 'completed' }}</td>
                                        <td>
                                            <a href="{{  url('admin/detail/'.$item->id) }}" class="btn btn-primary">View</a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>



@endsection
