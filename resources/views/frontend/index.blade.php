@extends('layouts.app')

@section('title', 'Home')


@section('content')

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($sliders as $key => $sliderItem)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="d-block w-100"
                        style="width: 100%; height: 555px; background-color: {{ $appSetting->siteColor }};">
                        <!-- Change here: background-color instead of img src -->
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content d-flex justify-content-between align-items-center"
                            style="width: 100%">
                            <div style="width: 70%;">
                                <h1>{!! $sliderItem->title !!}</h1>
                                <p>{!! $sliderItem->description !!}</p>
                                @if ($sliderItem->title != null && $sliderItem->description != null)
                                    <div>
                                        <a href="{{ url('collections') }}" class="btn"
                                            style="color:white;border-color:white">Shop Now</a>
                                    </div>
                                @endif
                            </div>
                            <div style="width: 44%;">
                                <img src="{{ asset("$sliderItem->icon") }}" class="float-end animated-icon"
                                    style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="rotating-text-container">

        <div class="py-5 bg-white">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-md-8 justify-content-center">
                        <h4 class="text-center" style="color: {{ $appSetting->siteColor }}"> Welcome To E-Mart </h4>
                        <div class="underline1 text-center" style="background-color: {{ $appSetting->siteColor }}"></div>
                        <p class="p12">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque deleniti debitis, fuga rerum
                            qui
                            fugit natus nulla dolore quod repellat, ratione temporibus commodi reiciendis et repudiandae
                            sint
                            esse sequi pariatur!
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>

    {{-- Trending Products --}}
    <div class="py-5" style="background-color: #e4e4e4;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h4>Trending Products</h4>
                    <div class="underline text-center" style="background-color: {{ $appSetting->siteColor }}"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme trending-product">
                        <!-- Your product items here -->
                        @foreach ($trendingProducts as $productItem)
                            <div class="item">
                                <div class="product-card">
                                    <div class="badge">

                                        <label class="badge bg-danger">Trending</label>

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
                                        <h4><a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}"
                                                style="color: {{ $appSetting->siteColor }}">
                                                {{ $productItem->name }}
                                            </a>
                                        </h4>
                                        <p>{{ $productItem->small_description }}</p>
                                        <div class="product-bottom-details">
                                            <div class="product-price">
                                                <small>{{ $productItem->original_price }}</small>{{ $productItem->selling_price }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-5 hover-light" style="background-color: #e4e4e4;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h4> Trending Products </h4>
                    <div class="underline text-center"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme trending-product">

                        @foreach ($trendingProducts as $productItem)
                            <div class="item">
                                <div class="product-card">
                                    <div class="badge">

                                        <label class="badge bg-danger">Trending</label>

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
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- New Arrivals --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h4> New Arrivals
                        <a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline text-center" style="background-color: {{ $appSetting->siteColor }}"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme new-arrival">

                        @forelse ($newArrivalsProducts as $productItem)
                            <div class="col-md-3">
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
                                        <h4><a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}"
                                                style="color: {{ $appSetting->siteColor }}">
                                                {{ $productItem->name }}
                                            </a>
                                        </h4>
                                        <p>{{ $productItem->small_description }}</p>
                                        <div class="product-bottom-details">
                                            <div class="product-price">
                                                <small>{{ $productItem->original_price }}</small>{{ $productItem->selling_price }}
                                            </div>
                                            {{-- <div class="product-links">
                                        <a href=""><i class="fa fa-heart"></i></a>
                                        <a href=""><i class="fa fa-shopping-cart"></i></a>
                                    </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 p-2">
                                <h4>No Products Available</h4>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Featured Products --}}
    <div class="py-5 " style="background-color: #e4e4e4;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h4> Featured Products
                        <a href="{{ url('featuredProducts') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline text-center" style="background-color: {{ $appSetting->siteColor }}"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme featured">

                        @forelse ($featuredProducts as $productItem)
                            <div class="col-md-3">
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
                                        <h4><a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}"
                                                style="color: {{ $appSetting->siteColor }}">
                                                {{ $productItem->name }}
                                            </a>
                                        </h4>
                                        <p>{{ $productItem->small_description }}</p>
                                        <div class="product-bottom-details">
                                            <div class="product-price">
                                                <small>{{ $productItem->original_price }}</small>{{ $productItem->selling_price }}
                                            </div>
                                            {{-- <div class="product-links">
                                                <a href=""><i class="fa fa-heart"></i></a>
                                                <a href=""><i class="fa fa-shopping-cart"></i></a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 p-2">
                                <h4>No Products Available</h4>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('.trending-product').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                200: {
                    items: 2
                },
                450: {
                    items: 3
                },
                750: {
                    items: 4
                },
                1550: {
                    items: 5
                }
            }
        })

        $('.new-arrival').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                200: {
                    items: 2
                },
                450: {
                    items: 3
                },
                750: {
                    items: 4
                },
                1550: {
                    items: 5
                }
            }
        })

        $('.featured').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                200: {
                    items: 2
                },
                450: {
                    items: 3
                },
                750: {
                    items: 4
                },
                1550: {
                    items: 5
                }
            }
        })
    </script>
@endsection
