@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Order View
                            <a href="{{ url('my_orders') }}" class="btn btn-warning text-white float-end">Zurück</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Kunde info</h4>
                                <hr>
                                <label for="">Vorname</label>
                                <div class="border">{{ $orders->fname }}</div>
                                <label for="">Nachname</label>
                                <div class="border ">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border ">{{ $orders->email }}</div>
                                <label for="">Contact</label>
                                <div class="border ">{{ $orders->phone }}</div>
                                <label for="">Address</label>
                                <div class="border ">
                                    {{ $orders->address1 }},<br>
                                    {{ $orders->address2 }},<br>
                                    {{ $orders->city }},
                                    {{ $orders->country }},
                                </div>
                                <label for="">PLZ</label>
                                <div class="border p-2">{{{ $orders->zip_code }}}</div>

                            </div>

                            <div class="col-md-6">
                                <h4>Bestellungsdetail</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Preis</th>
                                        <th>Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders->orderitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <img src=" {{asset('assets/uploads/products/'.$item->products->image)}}" width="50px" alt="Product Image">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Gesamtbetrag : <span class="float-end">{{ $orders->total_price }}€</span></h4>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection






