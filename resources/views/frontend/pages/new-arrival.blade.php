@extends('layouts.app')

@section('title', 'New Arrival Product')

@section('content')

<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4> New Products </h4>
                <div class="underline text-center" style="background-color: {{ $appSetting->siteColor }}"></div>
            </div>

            @forelse ($newArrivalsProducts as $productItem)
                <div class="col-md-3" >
                        <div class="product-card">
                            <div class="badge">

                                    <label class="badge bg-danger">New</label>

                            </div>
                            <div class="product-tumb">
                                @if ($productItem->productImages->count() > 0)
                                    <a
                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        <img src="{{ asset($productItem->productImages[0]->image) }}"
                                            style=" bg-color:white box-align: center width: 240px; height:230px;"
                                            alt="{{ $productItem->name }}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-details">
                                <span class="product-catagory">{{ $productItem->brand }}</span>
                                <h4><a
                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}" style="color: {{ $appSetting->siteColor }}">
                                        {{ $productItem->name }}
                                    </a>
                                </h4>
                                <p>{{ $productItem->small_description }}</p>
                                <div class="product-bottom-details">
                                    <div class="product-price">
                                        <small>{{ $productItem->original_price }}</small>{{ $productItem->selling_price }}
                                    </div>
                                    <div class="product-links">
                                        <a href=""><i class="fa fa-heart"></i></a>
                                        <a href=""><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @empty
                <div class="col-md-12 p-2">
                    <h4>No Products Available</h4>
                </div>
            @endforelse

            <div class="text-center">
                <a href="{{ url('collections') }}" class="btn btn-warning">View More</a>
            </div>
        </div>
    </div>
</div>
@endsection

