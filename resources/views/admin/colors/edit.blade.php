@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-header">
                    <h3>Add Colors
                        <a href="{{ url('admin/colors') }}" class="btn btn-danger btn-sm float-end">Back</a>
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

                    <form action="{{ url('admin/colors/'.$color->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label > Color Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $color->name }}">
                        </div>
                        <div class="mb-3">
                            <label > Color Code </label>
                            <input type="text" name="code" class="form-control" value="{{ $color->code }}">
                        </div>
                        <div class="mb-3">
                            <label > Status </label>
                            <input type="checkbox" name="status" value="1" style="width: 25px; height: 25px;" {{ $color->status == 1 ? 'checked' : '' }}>
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
