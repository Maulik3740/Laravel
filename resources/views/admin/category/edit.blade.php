@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Edit Category
                    <a href="{{ url('admin/category/') }}" class="btn btn-primary btn-sm  text-white float-end">Back</a>
                </h3>
            </div>

            <div class="card-body">

                <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label> @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        <input type="text" name="name"  value="{{ $category->name }}" class="form-control" style="border-color:rgba(0, 0, 0, 0.24)" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Slug</label>@error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        <input type="text" name="slug"  value="{{ $category->slug }}" class="form-control" style="border-color:rgba(0, 0, 0, 0.24)">
                    </div>
                    <div class="col-md-8 mb-3">
                        <label>Description</label>@error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        <textarea name="description"  value="" class="form-control" rows='3' style="border-color:rgba(0, 0, 0, 0.24)">{{ $category->description }}</textarea>
                    </div>
                    {{-- <div class=" col-md-2 mb-3 text-center">
                        <label>Status</label>
                        <input type="checkbox"  name="status"  value="{{ $category->status == 1 ? 'checked' : '' }}" {{ $category->status == 1 ? 'checked' : '' }} style="border-color:rgba(0, 0, 0, 0.24)">
                    </div> --}}
                    <div class="col-md-2 mb-3 text-center">
                        <label>Status</label>
                        <input type="checkbox" name="status" {{ $category->status == 1 ? 'checked' : '' }} style="border-color:rgba(0, 0, 0, 0.24)">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Image</label>@error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        <input type="file" name="image" class="form-control" style="border-color:rgba(0, 0, 0, 0.24)">
                    </div>
                        <div class="col-md-6 mb-3">
                            <img src="{{ asset('/uploads/category/'.$category->image) }}" width="200px" height="200px" class="float-right">
                        </div>

                    <div class=" col-md-12 mb-3">
                        <label>Meta Title</label>@error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
                        <input type="text" name="meta_title"  value="{{ $category->meta_title }}" class="form-control" style="border-color:rgba(0, 0, 0, 0.24)">
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label>Meta Keyword</label>@error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
                        <textarea name="meta_keyword"  value="" class="form-control" rows="3" style="border-color:rgba(0, 0, 0, 0.24)">{{ $category->meta_keyword }}</textarea>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label>Meta Description</label>@error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                        <textarea name="meta_description"  value="" class="form-control" rows="3" style="border-color:rgba(0, 0, 0, 0.24)">{{ $category->description }}</textarea>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end text-white" style="border-color:rgba(0, 0, 0, 0.24)">Update</button>
                    </div>
                </form>
            </div>
            </div>

        </div>
    </div>
</div>

@endsection
