<div class="main-navbar shadow-sm sticky-top">
    @if ($appSetting->siteColor != null)
        <div class="top-navbar" style="background-color: {{ $appSetting->siteColor }}">
        @else
            <div class="top-navbar">
    @endif
    {{-- <div class="top-navbar"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                @if ($appSetting->logo)
                    <h5 class="brand-name"><img src="{{ asset("$appSetting->logo") }}" style="width:98px ;height:56px">
                        &nbsp; {{ $appSetting->website_name ?? 'Website Name' }}</h5>
                @else
                    <h5 class="brand-name"><img src="{{ asset('admin/images/auth/1.png') }}"
                            style="width:98px ;height:56px">&nbsp; {{ $appSetting->website_name ?? 'Website Name' }}
                    </h5>
                @endif
            </div>
            <div class="col-md-5 my-auto">
                <form action="{{ url('search') }}" method="GET" role="search">
                    <div class="input-group">
                        <input type="search" name="search" value="{{ Request::get('search') }}"
                            placeholder="Search your product" class="form-control" />
                        <button class="btn bg-white" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-5 my-auto">
                <ul class="nav justify-content-end">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('cart') }}">
                            <i class="fa fa-shopping-cart"></i> Cart (<livewire:frontend.cart.cart-count />)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('wishlist') }}">
                            <i class="fa fa-heart"></i> Wishlist (<livewire:frontend.wishlist.wishlist-count />)
                        </a>
                    </li>

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <div class="nav-item dropdown">
                            {{-- <button class="dropdown-button"><a class="dropdown-item" href="{{ url('wishlist') }}">
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                </a></button> --}}
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">

                                <i class="fa fa-user"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-content">
                                <!-- Add options with links -->

                                <a class="dropdown-item" href="{{ url('profile') }}"><i class="fa fa-user"></i> Profile</a>

                                <a class="dropdown-item p-3" href="{{ url('orders') }}">
                                    <i class="fa fa-list"></i> My Orders
                                </a>

                                <a class="dropdown-item" href="{{ url('wishlist') }}"><i class="fa fa-heart"></i> My
                                    Wishlist</a>

                                <a class="dropdown-item" href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i> My
                                    Cart</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </div>


                    @endguest
                </ul>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
            Funda Ecom
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/collections') }}">All Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/new-arrivals') }}">New Arrivals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/featuredProducts') }}">Featured Products</a>
                </li>
                {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Electronics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fashions</a>
                    </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about_us') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                </li>
                {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Appliances</a>
                    </li> --}}
            </ul>
        </div>
    </div>
</nav>
</div>


<script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
        subMenu.classList.toggle('open-menu');
    }
</script>
