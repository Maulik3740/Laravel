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
                        <div class="col-md-3">
                            <label for=""> Filter by Status </label>
                            <select name="status" class="form-control" style="background-color: white; color: black; height:45px">
                                <option value="">Select Status </option>
                                <option value="in progress">In Progress {{ Request::get('status') == 'in progress' ? '✓' : '' }}</option>
                                <option value="completed">Completed {{ Request::get('status') == 'completed' ? '✓' : ''}}</option>
                                <option value="pending">Pending {{ Request::get('status') == 'pending' ? '✓' : ''}}</option>
                                <option value="cancelled">Cancelled {{ Request::get('status') == 'cancelled' ? '✓' : ''}}</option>
                                <option value="out-of-delivery">Out for Delivery {{ Request::get('status') == 'out-of-delivery' ? '✓' : ''}}</option>
                            </select>
                        </div>
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
                                    <th>Order ID</th>
                                    <th>Tracking No</th>
                                    <th>Username</th>
                                    <th>Payment Mode</th>
                                    <th>Ordered Data</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ $item->fullname }}</td>
                                            <td>{{ $item->payment_mode }}</td>
                                            <td>{{ $item->created_at->format('d-m-y') }}</td>
                                            <td>{{ $item->status_message }}</td>
                                            <td> <a href="{{ url('/admin/orders/'.$item->id) }}" class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                    @empty

                                        <tr > <td colspan="7"> Order Available </td></tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        {{ $orders->links('pagination::bootstrap-4') }}
                </div>
        </div>

    </div>
</div>

@endsection
