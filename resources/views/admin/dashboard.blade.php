@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">


            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }},{{ Auth::user()->name }}</div>
            @endif
            <div class="me-md-3 me-xl-5">
                <h1> DashBoard</h1>
                <p class="mb-md-0">Your analytics dashboard template.</p>
                <hr>
                <br>
            </div>

            <div class="row">

                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label for=""> Total Orders</label>
                        <h1>{{ $totalOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label for=""> Today Orders</label>
                        <h1>{{ $todayOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label for=""> This Month Orders </label>
                        <h1>{{ $thisMonthOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label for=""> Year Orders </label>
                        <h1>{{ $thisYearOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>
            </div>

            <hr>
            <br>

            <div class="row">

                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label for=""> Total Products</label>
                        <h1>{{ $totalProducts }}</h1>
                        <a href="{{ url('admin/products') }}" class="text-white">View</a>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label for=""> Total Categorys</label>
                        <h1>{{ $totalCategories }}</h1>
                        <a href="{{ url('admin/category') }}" class="text-white">View</a>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label for=""> Total Brands </label>
                        <h1>{{ $totalBrands }}</h1>
                        <a href="{{ url('admin/brands') }}" class="text-white">View</a>
                    </div>
                </div>

            </div>

            <hr>
            <br>

            <div class="row">

                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label for=""> All Users </label>
                        <h1>{{ $totalAllUsers }}</h1>
                        <a href="{{ url('admin/users') }}" class="text-white">View</a>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label for=""> Total Admin </label>
                        <h1>{{ $totalAdmin }}</h1>
                        <a href="{{ url('admin/users') }}" class="text-white">View</a>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label for=""> Total User </label>
                        <h1>{{ $totalUsers }}</h1>
                        <a href="{{ url('admin/users') }}" class="text-white">View</a>
                    </div>
                </div>

            </div>



        </div>
    </div>
@endsection
