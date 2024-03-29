@extends('layouts.app')

@section('title', 'AboutUs')


@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden">
                        <!-- Your existing content -->
                        <img src="{{ asset('admin/images/auth/2.jpeg') }}">

                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4" style="color: {{ $appSetting->siteColor }}">We Help To Get The Best Job And Find A
                        Talent</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                    <button class="btn btn-primary py-3 px-5 mt-3" id="read-more"
                        style="background-color: {{ $appSetting->siteColor }}">Read More</button>
                </div>
            </div>

            <!-- Additional content container -->
            <div id="additional-content" style="display: none;">
                <div class="row">
                    <!-- Additional content here -->

                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('admin/images/auth/1.jpeg') }}" class="img-fluid" alt="Image"
                                    style="width: 85%;height: 300px;">
                            </div>
                            <div class="col-md-6" style="padding-top: 40px">
                                <h2 style="color: {{ $appSetting->siteColor }}">Text Heading</h2>
                                <div class="underline text-center" style="background-color: {{ $appSetting->siteColor }}">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis ex ut metus
                                    rhoncus, sit amet bibendum urna commodo. Nam vitae odio eget arcu convallis lobortis.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 order-md-2">
                                <img src="{{ asset('admin/images/auth/2.jpeg') }}" class="img-fluid" alt="Image"
                                    style="width: 85%;height: 300px;">
                            </div>
                            <div class="col-md-6 order-md-1" style="padding-top: 40px">
                                <h2 style="color: {{ $appSetting->siteColor }}">Text Heading</h2>
                                <div class="underline text-center" style="background-color: {{ $appSetting->siteColor }}">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis ex ut metus
                                    rhoncus, sit amet bibendum urna commodo. Nam vitae odio eget arcu convallis lobortis.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('admin/images/auth/3.png') }}" class="img-fluid" alt="Image"
                                    style="width: 85%;height: 300px;">
                            </div>
                            <div class="col-md-6" style="padding-top: 40px">
                                <h2 style="color: {{ $appSetting->siteColor }}">Text Heading</h2>
                                <div class="underline text-center" style="background-color: {{ $appSetting->siteColor }}">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis ex ut metus
                                    rhoncus, sit amet bibendum urna commodo. Nam vitae odio eget arcu convallis lobortis.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Add event listener to the "Read More" button
        document.getElementById('read-more').addEventListener('click', function() {
            // Toggle the visibility of the additional content container
            document.getElementById('additional-content').style.display = 'block';
        });
    </script>
@endsection
