@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-header">
                    <h3>Add Sliders
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

                    <form action="{{ url('admin/sliders/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label > Title </label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label > Description </label>
                            <textarea type="text" name="description" class="form-control" rows="3"></textarea>
                        </div>
                        {{-- <div class="mb-3">
                            <label > Image </label>
                            <input type="file" name="image" class="form-control" >
                        </div> --}}
                        <div class="mb-3">
                            <label>Icon</label>
                            <input type="file" name="icon" id="icon" class="form-control" onchange="previewImage(event)" style="width: 400px; ">
                            <img id="imagePreview" class="float-center" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;">
                        </div>

                        <div class="mb-3">
                            <label > Status </label>
                            <input type="checkbox" name="status" value="1" style="width: 25px; height: 25px;">Check = Hidden , Un-check = Visible
                        </div>


                        <div>
                            <button type="submit" class="btn btn-success text-white">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function () {
                var dataURL = reader.result;
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.src = dataURL;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    </script>

@endsection
