@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-header">
                    <h3>Sliders
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm float-end text--white">Add
                            Color</a>
                    </h3>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Icon</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $key => $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td width="15%">
                                        <img src="{{ asset("$slider->icon") }}"
                                            style="width: 75%; height: 100px; border-radius: 0%;">
                                    </td>
                                    <td>{{ $slider->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/sliders/' . $slider->id . '/edit') }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/sliders/' . $slider->id . '/delete') }}"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are You Sure')">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Colors Available</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
