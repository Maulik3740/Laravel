@extends('layouts.admin')

@section('title', 'My Orders')


@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>My Order
                    {{-- <a href="{{ url('admin/category/') }}" class="btn btn-primary btn-sm  text-white float-end">Back</a> --}}
                </h3>
            </div>
                <div class="card-body">

                    <form action="" method="GET">
                        <div class="row">
                        <div class="col-md-3">
                            <label > Filter by Data </label>
                            <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                        </div>
                        {{-- <div class="col-md-3">
                            <label for=""> Filter by Status </label>
                            <select name="status" class="form-control" style="background-color: white; color: black; height:45px">
                                <option value="">Select Status </option>
                                <option value="in progress">In Progress {{ Request::get('status') == 'in progress' ? '✓' : '' }}</option>
                                <option value="completed">Completed {{ Request::get('status') == 'completed' ? '✓' : ''}}</option>
                                <option value="pending">Pending {{ Request::get('status') == 'pending' ? '✓' : ''}}</option>
                                <option value="cancelled">Cancelled {{ Request::get('status') == 'cancelled' ? '✓' : ''}}</option>
                                <option value="out-of-delivery">Out for Delivery {{ Request::get('status') == 'out-of-delivery' ? '✓' : ''}}</option>
                            </select>
                        </div> --}}
                        <div class="col-md-6">
                            <br>
                            <button type="submit" class="btn btn-primary"> Filter </button>
                        </div>
                    </div>
                    </form>
                    <div>
                        <br>
                    </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th width="20px">User ID</th>
                                    <th width="30px">Username</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>

                                </thead>
                                <tbody>
                                    @forelse ($contacts as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->Username }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>{{ $item->message}}</td>
                                        </tr>
                                    @empty

                                        <tr > <td colspan="7"> No Contacts Request Available </td></tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        {{-- {{ $orders->links('pagination::bootstrap-4') }} --}}
                </div>
        </div>

    </div>
</div>

@endsection
