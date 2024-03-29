@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4> User Profile
                        <a href="{{ url('change-password') }}" class="btn btn-warning float-end">Change Password</a>
                    </h4>
                    <div class="underline text-center"></div>
                </div>

                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <div class="col-md-10">
                    <div class="card shadow">
                        @if ($appSetting->siteColor != null)
                            <div class="card-header "style="background-color: {{ $appSetting->siteColor }}">
                                <h4 class="mb-0 text-white"> User Details</h4>
                            </div>
                        @else
                            <div class="card-header bg-primary">
                                <h4 class="mb-0 text-white"> User Details</h4>
                            </div>
                        @endif

                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif

                            <form action="{{ url('profile') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Username</label>
                                            <input type="text" name="username" value="{{ Auth::user()->name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Email Address</label>
                                            <input type="text" readonly value="{{ Auth::user()->email }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="phone"
                                                value="{{ Auth::user()->UserDetail->phone ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for=""> Zip/Pin Code</label>
                                            <input type="text" name="pin_code"
                                                value="{{ Auth::user()->UserDetail->pin_code ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="">Address</label>
                                            <textarea type="text" name="address" class="form-control">{{ Auth::user()->UserDetail->address ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary"
                                            style="background-color: {{ $appSetting->siteColor }}">Save Data</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
