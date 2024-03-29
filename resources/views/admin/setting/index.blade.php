@extends('layouts.admin')

@section('title', 'Admin Setting')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('/admin/settings') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card mb-3">
                    @if ($appSetting->siteColor != null)
                        <div class="card-header" style="background-color: {{ $appSetting->siteColor }}">
                        @else
                            <div class="card-header bg-primary">
                    @endif
                    {{-- <div class="card-header bg-primary"> --}}
                    <h3 class="text-white mb-0">Website</h3>
                </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for=""> Website Name</label>
                    <input type="text" name="website_name" value="{{ $setting->website_name }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for=""> Website URL</label>
                    <input type="text" name="website_url" value="{{ $setting->website_url }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for=""> Website Title</label>
                    <input type="text" name="page_title" value="{{ $setting->page_title }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for=""> Meta keywords</label>
                    <input type="text" name="meta_keywords" value="{{ $setting->meta_keywords }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for=""> Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ $setting->meta_description }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for=""> Website Logo</label>
                    <input type="file" name="logo" class="form-control" value="{{ $appSetting->logo }}">
                    <img src="{{ asset("$appSetting->logo") }}" style="width:98px ;height:56px">
                </div>
            </div>
        </div>


        <div class="card mb-3">
            @if ($appSetting->siteColor != null)
                <div class="card-header "style="background-color: {{ $appSetting->siteColor }}">
                @else
                    <div class="card-header bg-primary">
            @endif
            {{-- <div class="card-header bg-primary"> --}}
            <h3 class="text-white mb-0">Website - Information</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for=""> Address</label>
                <textarea name="address" class="form-control" rows="3">{{ $setting->address }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for=""> Phone No.1</label>
                <input type="text" name="phone1" value="{{ $setting->phone1 }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for=""> Phone No.2</label>
                <input type="text" name="phone2" value="{{ $setting->phone2 }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for=""> Email Id.1 </label>
                <input type="text" name="email1" value="{{ $setting->email1 }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for=""> Email Id.2 </label>
                <input type="text" name="email2" value="{{ $setting->email2 }}" class="form-control">
            </div>
        </div>
    </div>


    <div class="card mb-3">
        @if ($appSetting->siteColor != null)
            <div class="card-header " style="background-color: {{ $appSetting->siteColor }}">
            @else
                <div class="card-header bg-primary">
        @endif
        {{-- <div class="card-header "style="background-color: {{ $appSetting->siteColor }}"> --}}
        <h3 class="text-white mb-0">Website - Social Media</h3>
    </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for=""> Facebook (Optional) </label>
                <input type="text" name="facebook" value="{{ $setting->facebook }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for=""> Twitter (Optional)</label>
                <input type="text" name="twitter" value="{{ $setting->twitter }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for=""> Instagram (Optional)</label>
                <input type="text" name="instagram" value="{{ $setting->instagram }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for=""> YouTube (Optional) </label>
                <input type="text" name="youtube" value="{{ $setting->youtube }}" class="form-control">
            </div>
        </div>
    </div>


    <div class="card mb-3">
        @if ($appSetting->siteColor != null)
            <div class="card-header "style="background-color: {{ $appSetting->siteColor }}">
            @else
                <div class="card-header bg-primary">
        @endif
        {{-- <div class="card-header" style="background-color: {{ $appSetting->siteColor }}"> --}}
        <h3 class="text-white mb-0">Website Color</h3>
    </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label> Color (Color : Name, RGB, or ID): &nbsp;&nbsp;
                    <input type="color" id="colorPicker"
                        name="chosenColor" value="{{ $setting->siteColor }}"
                        style="margin-top: -5px;position: absolute;"></label>
                <br><br>
                {{-- <input type="color" name="siteColor" value="{{ $setting->siteColor }}" class="form-control"> --}}
                <input type="text" name="siteColor" id="color" placeholder="Enter color (name, RGB, or ID)"
                    value="{{ $setting->siteColor }}" class="form-control">
            </div>
        </div>
    </div>


    <div class="card mb-3">
        @if ($appSetting->siteColor != null)
            <div class="card-header" style="background-color: {{ $appSetting->siteColor }}">
            @else
                <div class="card-header bg-primary">
        @endif

        <h3 class="text-white mb-0">Website Map</h3>
    </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for=""> Map <span class="text-danger">(Location URL = www.google.com/maps/selecte location
                        & copy Embed Map Url &nbsp;|| &nbsp; Don't Add iframe tag)</span></label><br><br>
                <textarea name="Map" class="w-100" rows="3">{{ $appSetting->Map }}</textarea>
            </div>
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary text-white">Save Setting</button>
    </div>
    </form>
    </div>
    </div>

    <script>
        const colorPicker = document.getElementById('colorPicker');
        const colorInput = document.getElementById('color');

        colorPicker.addEventListener('change', function() {
            // Update the text input field with the color picker value
            colorInput.value = this.value;
        });
    </script>
@endsection
