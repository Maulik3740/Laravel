<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-5 mt-3">
                    <div id="imgview" class="bg-white border" wire:ignore style="width: 80%;">
                        @if ($product->productImages)
                            {{-- <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img" style="margin-left: 30%"> --}}
                            <div class="exzoom" id="exzoom">
                                <!-- Images -->
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @foreach ($product->productImages as $itemImg)
                                            <li><img src="{{ asset($itemImg->image) }}" /></li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>

                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn">
                                        < </a>
                                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                </p>
                            </div>
                        @else
                            No Image Available
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">{{ $product->selling_price }}₹</span>
                            <span class="original-price">{{ $product->original_price }}₹</span>
                        </div>
                        <div>
                            @if ($product->productColors->count() > 0)

                                @if ($product->productColors)

                                    @foreach ($product->productColors as $colorItem)
                                        {{-- &nbsp;&nbsp; <input type="radio" name="colorSelection"
                                    value="{{ $colorItem->id }}" />{{ $colorItem->color->name }} --}}
                                        <label class="colorSelectionLabel"
                                            style="background-color: {{ $colorItem->color->code }}"
                                            wire:click="colorSelected({{ $colorItem->id }})">
                                            {{ $colorItem->color->name }}
                                        </label>
                                    @endforeach
                                @endif

                                <div>

                                    @if ($this->prodColorSelectedQuantity == 'outOfStock')
                                        <label class="btn-sm py-1 mt-2 text-white bg-danger rounded-pill">Out of
                                            Stock</label>
                                    @elseif ($this->prodColorSelectedQuantity > 0)
                                        <label class="btn-sm py-1 mt-2 text-white bg-success rounded-pill">In
                                            Stock</label>
                                    @endif

                                </div>
                            @else
                                @if ($product->quantity)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                @else
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                @endif

                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>

                                <input type="text" value="1" class="input-quantity" wire:model="QuantityCount"
                                    readonly />

                                <span class="btn btn1" wire:click="incrementQuantity" ><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>

                            <button type="button" wire:click="addToWishLists({{ $product->id }})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishLists">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishLists">
                                    Adding..
                                </span>
                            </button>

                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{ $product->small_description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Category related product --}}
    <div class="py-3 py-md-5 bg-white" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>
                        @if ($category)
                            {{ $category->name }}
                        @endif
                        Related Products
                    </h3>
                    <div class="underline text-center"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme CategoryRelated">

                @forelse ($category->relatedProducts as $productItem)
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- brand related product --}}
    <div class="py-3 py-md-5 " style="background-color: #e4e4e4;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>
                        @if ($category)
                            {{ $product->brand }}
                        @endif
                        Related Products
                    </h3>
                    <div class="underline text-center"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme BrandRelated">

                @forelse ($category->relatedProducts as $productItem)
                    @if ($productItem->brand == $product->brand)
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
                    @endif
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


    @push('scripts')
        <script>
            $(function() {

                $("#exzoom").exzoom({

                    // thumbnail nav options
                    "navWidth": 60,
                    "navHeight": 60,
                    "navItemNum": 5,
                    "navItemMargin": 7,
                    "navBorder": 1,

                    // autoplay
                    "autoPlay": true,

                    // autoplay interval in milliseconds
                    "autoPlayTimeout": 2000

                });

            });


            // this is for owl carousel


        $('.CategoryRelated').owlCarousel({
            loop: true,
            margin: 300,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })

        $('.BrandRelated').owlCarousel({
            loop: true,
            margin: 300,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })

        </script>
    @endpush
