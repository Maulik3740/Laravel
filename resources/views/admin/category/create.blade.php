@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Add Category
                    <a href="{{ url('admin/category/') }}" class="btn btn-primary btn-sm  text-white float-end">Back</a>
                </h3>
            </div>

            <div class="card-body">

                <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label> @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        <input type="text" name="name" class="form-control" style="border-color:rgba(0, 0, 0, 0.24)" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Slug</label>@error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        <input type="text" name="slug" class="form-control" style="border-color:rgba(0, 0, 0, 0.24)">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Description</label>@error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        <textarea name="description" class="form-control" rows='3' style="border-color:rgba(0, 0, 0, 0.24)"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Image</label>@error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        <input type="file" name="image" class="form-control" style="border-color:rgba(0, 0, 0, 0.24)">
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label>Status</label><br>
                        <input type="checkbox" name="status" style="border-color:rgba(0, 0, 0, 0.24)">
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label>Meta Title</label>@error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
                        <input type="text" name="meta_title" class="form-control" style="border-color:rgba(0, 0, 0, 0.24)">
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label>Meta Keyword</label>@error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
                        <textarea name="meta_keyword" class="form-control" rows="3" style="border-color:rgba(0, 0, 0, 0.24)"></textarea>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label>Meta Description</label>@error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                        <textarea name="meta_description" class="form-control" rows="3" style="border-color:rgba(0, 0, 0, 0.24)"></textarea>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end text-white" style="border-color:rgba(0, 0, 0, 0.24)">Save</button>
                    </div>
                </form>
            </div>
            </div>

        </div>
    </div>
</div>

@endsection
