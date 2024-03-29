
<div>
    <div class="row">
        <div class="col-md-3">
            @if ($category->brands)
                <div class="card">
                    <div class="card-header">
                        <h4>Brands</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($category->brands as $brandItem)
                            <label class="d-block">
                                {{ $brandItem->name }}
                                <input type="checkbox" wire:model.live="brandInputs"
                                    value="{{ $brandItem->name }}" />
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4 >Price</h4>
                </div>
                <div class="card-body">
                    <label class="d-block">

                        <input type="radio" wire:model.live="priceInput" name="priceSort" value="high-to-low" />&nbsp;   High to Low
                    </label>
                    <label class="d-block">
                        <input type="radio" wire:model.live="priceInput" name="priceSort" value="low-to-high" />&nbsp;   Low to High
                    </label>
                </div>
            </div>

        </div>

        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $productItem)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="badge">
                                @if ($productItem->quantity > 0)
                                    <label class="badge bg-success">In Stock</label>
                                @else
                                    <label class="badge bg-danger">Out Of Stock</label>
                                @endif
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
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available for {{ $category->name }}</h4>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

</div>
