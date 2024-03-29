@extends('layouts.app')

@section('title', 'All Categories')


@section('content')

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>

                @forelse($categories as $key => $category)
                    <div class="col-6 col-md-3">
                        <div class="category-card"
                            style="border-radius: 20px;"
                            onmouseover="this.style.boxShadow='0 10px 10px {{ $appSetting->siteColor }}';"
                            onmouseout="this.style.boxShadow='none';">
                            <a href="{{ url('/collections/' . $category->slug) }}">
                                <div class="category-card-img" style="border-radius: 20px;">
                                    <img src="{{ asset('/uploads/category/' . $category->image) }}" class="w-100">
                                </div>
                                <div class="category-card-body">
                                    <h5 style="color: {{ $appSetting->siteColor }}">{{ $category->name }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h5>No Category</h5>
                    </div>
                @endforelse
            </div>
        </div>
    </div>


@endsection
