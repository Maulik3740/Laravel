@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-header">
                    <h3>Edit Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">


                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                    <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label > Title </label>
                            <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                        </div>
                        <div class="mb-3">
                            <label > Description </label>
                            <textarea type="text" name="description" class="form-control" rows="3">{{ $slider->description }}</textarea>
                        </div>
                        {{-- <div class="mb-3">
                            <label > Image </label>
                            <input type="file" name="image" class="form-control" >
                            <img src="{{ asset("$slider->image") }}" style="width: 90px; height: 90px;">
                        </div> --}}
                        <div class="mb-3">
                            <label > Icon </label>
                            <input type="file" name="icon" class="form-control" >
                            <img src="{{ asset("$slider->icon") }}" style="width: 90px; height: 90px;">
                        </div>
                        <div class="mb-3">
                            <label > Status </label>
                            <input type="checkbox" name="status" value="1" style="width: 25px; height: 25px;"  {{ $slider->status == 1 ? 'checked' : '' }}>Check = Hidden , Un-check = Visible
                        </div>


                        <div>
                            <button type="submit" class="btn btn-success text-white">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
