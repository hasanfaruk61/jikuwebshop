@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('checkout')}}">
                    Checkout
                </a>
            </h6>
        </div>
    </div>


    <div class="container mt-3">
        <form action="{{ url('place-order') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Kunde Details:</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">Vorname</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="fname" placeholder="Vorname">
                            </div>
                            <div class="col-md-6">
                                <label for="">Nachname</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->lname }}" name="lname" placeholder="Nachname">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone" placeholder="Telephonnummer">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Addresse">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Addresse 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Stadt</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city" placeholder="Stadt">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">PLZ</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->zip_code }}" name="zip_code" placeholder="PLZ..">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Land</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->country }}" name="country" placeholder="Land">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        Order Details
                        @if($cartitems->count() > 0)
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr style="font-weight:bold;">
                                <td>Produkt</td>
                                <td>Stück</td>
                                <td>Preis</td>
                            </tr>

                            </thead>
                            <tbody>
                                @foreach($cartitems as $item)
                                    <tr>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->product_qty }}</td>
                                        <td>{{ $item->products->sellingPrice }} </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary w-100">Bestätigen</button>
                        @else
                            <hr>
                        <h3 style="text-align: center">kein Produkt in Warenkorb!</h3>

                        @endif
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
