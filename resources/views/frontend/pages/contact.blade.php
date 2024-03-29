@extends('layouts.app')

@section('title', 'contact')


@section('content')

    <div class="container">
        <div class="row mt-5 " >
            <div class="col-md-6 bg-light p-4">
                <h2 style="color: {{ $appSetting->siteColor }}">Contact Information</h2>
                <div class="underline text-center" style="background-color: {{ $appSetting->siteColor }}"></div>
                <p style="font-size: 25px;margin-top: 30px;font-family: Monotype Corsiva;"><strong>Address:</strong> {{ $appSetting->address ?? 'Address' }}</p>
                <p style="font-size: 25px;margin-top: 30px;font-family: Monotype Corsiva;"><strong>Email:</strong> {{ $appSetting->email1 ?? 'Email' }}</p>
                <p style="font-size: 25px;margin-top: 30px;font-family: Monotype Corsiva;"><strong>Phone:</strong> {{ $appSetting->phone1 ?? 'Phone' }}</p>
                <br><br>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        <br><br>

                        @if ($appSetting->facebook)
                            <a href="{{ $appSetting->facebook }}" class="mr-9" style="margin-right: 15px; color:{{ $appSetting->siteColor }}"><i class="fa fa-facebook fa-lg"></i></a>
                        @endif

                        @if ($appSetting->twitter)
                            <a href="{{ $appSetting->twitter }}" class="mr-9" style="margin-right: 15px; color:{{ $appSetting->siteColor }}"><i class="fa fa-twitter fa-lg"></i></a>
                        @endif

                        @if ($appSetting->instagram)
                            <a href="{{ $appSetting->instagram }}" class="mr-9" style="margin-right: 15px; color:{{ $appSetting->siteColor }}"><i class="fa fa-instagram fa-lg"></i></a>
                        @endif

                        @if ($appSetting->youtube)
                            <a href="{{ $appSetting->youtube }}" style="margin-right: 15px; color:{{ $appSetting->siteColor }}"><i class="fa fa-youtube fa-lg"></i></a>
                        @endif
                    </div>
                </div>

            </div>
          <div class="col-md-6">
            <h2 style="color: {{ $appSetting->siteColor }}">Contact Form</h2>
            <div class="underline text-center" style="background-color: {{ $appSetting->siteColor }}"></div>
            @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif

            <form action="{{ url('/contact') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="Username" id="name"
                                value="{{ Auth::user()->name }}" placeholder="Your Name">
                            <label for="name">Your Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ Auth::user()->email }}" placeholder="Your Email">
                            <label for="email">Your Email</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject">
                            <label for="subject">Subject</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="message" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                            <label for="message">Message</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit"
                            style="background-color: {{ $appSetting->siteColor }}">Send Message</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col">
            <h2 style="color: {{ $appSetting->siteColor }}" class="text-center">Location</h2>
            <div class="underline1 text-center" style="background-color: {{ $appSetting->siteColor }}"></div>
            <div id="map" style="height: 500px; width:118%; margin-left:-115px;margin-bottom: -43px;">
                <iframe src=" {{ $appSetting->Map }}" frameborder="0" style="border:0; width:100%; height:90%"
                    allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>
        </div>
      </div>


      @endsection
