@extends('layouts.front')

    @section('title')
        JIKU E-Shop
    @endsection

    @section('content')
        @include('layouts.inc.slider')
<div class="container">
    <div class="py-5">
           <div class="container">
               <div class="row">
                <h2>Angebot</h2>
                   <div class="owl-carousel owl-theme featured-product">
                       @foreach($featured_products as $product)
                           <div class="item" >
                               <a href="{{ url('category/'.$product->category->slug.'/'.$product->slug)}}">
                                   <div class="card">
                                       <img src="{{ asset('assets/uploads/products/'.$product->image) }}" height="140" width="120" alt="Product-image">
                                       <div class="card-body">
                                           <h5>{{ $product->name }}</h5>
                                           <span class="float-start">{{ $product->sellingPrice }}€</span>
                                           <span class="float-end"><s>{{ $product->originalPrice }}€</s></span>
                                       </div>
                                   </div>
                               </a>
                           </div>
                       @endforeach
                   </div>
               </div>
           </div>
       </div>
    <div class="py-5">
            <div class="container">
                <div class="row">
                    <h2>Trending Kategorie</h2>
                    <div class="owl-carousel owl-theme featured-product" >
                        @foreach($trending_category as $item)
                            <div class="item">
                                <a href="{{ url('view-category/'.$item->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'.$item->image) }}"  alt="Product-image">
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

</div>
    @endsection
    @section('scripts')
        <script>
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                dots:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            })
        </script>
    @endsection
