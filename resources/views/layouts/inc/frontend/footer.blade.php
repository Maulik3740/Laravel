<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce Cart/Wishlist Page Design</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">


</head>

<body>

    <div>
        @if ($appSetting->siteColor != null)
            <div class="footer-area" style="background-color: {{ $appSetting->siteColor }}">
        @else
            <div class="footer-area">
        @endif
        {{-- <div class="footer-area"> --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="footer-heading">{{ $appSetting->website_name ?? 'Website Name' }}</h4>
                        <div class="footer-underline"></div>
                        <p>
                            {{ $appSetting->meta_description ?? 'Website description' }}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Quick Links</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Home</a></div>
                        <div class="mb-2"><a href="{{ url('/about_us') }}" class="text-white">About Us</a></div>
                        <div class="mb-2"><a href="{{ url('/contact') }}" class="text-white">Contact Us</a></div>
                        {{-- <div class="mb-2"><a href="" class="text-white">Blogs</a></div>
                        <div class="mb-2"><a href="" class="text-white">Sitemaps</a></div> --}}
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Shop Now</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Collections</a></div>
                        <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Trending Products</a></div>
                        <div class="mb-2"><a href="{{ url('/new-arrivals') }}" class="text-white">New Arrivals
                                Products</a></div>
                        <div class="mb-2"><a href="{{ url('/featuredProducts') }}" class="text-white">Featured
                                Products</a></div>
                        <div class="mb-2"><a href="{{ url('cart') }}" class="text-white">Cart</a></div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Reach Us</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2">
                            <p>
                                <i class="fa fa-map-marker"></i>
                                <a href="https://maps.google.com/maps?q={{ urlencode($appSetting->address ?? 'Address') }}" target="_blank" style="color: rgb(255, 255, 255); text-decoration: none;">
                                    {{ $appSetting->address ?? 'Address' }}
                                </a>
                            </p>
                        </div>
                        <div class="mb-2">
                            <a href="tel:{{ $appSetting->phone1 ?? 'Phone' }}" class="text-white">
                                <i class="fa fa-phone"></i>{{ $appSetting->phone1 ?? 'Phone' }}
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="mailto:{{ $appSetting->email1 ?? 'Email' }}" class="text-white">
                                <i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'Email' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p class=""> &copy; 2022 - E-mart - Ecommerce. All rights reserved.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="social-media">
                            Get Connected:
                            {{ $appSetting->phone1 ?? 'Phone' }}

                            @if ($appSetting->facebook)
                                <a href="{{ $appSetting->facebook }}"><i class="fa fa-facebook"></i></a>
                            @endif

                            @if ($appSetting->twitter)
                                <a href="{{ $appSetting->twitter }}"><i class="fa fa-twitter"></i></a>
                            @endif

                            @if ($appSetting->instagram)
                                <a href="{{ $appSetting->instagram }}"><i class="fa fa-instagram"></i></a>
                            @endif

                            @if ($appSetting->youtube)
                                <a href="{{ $appSetting->youtube }}"><i class="fa fa-youtube"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
