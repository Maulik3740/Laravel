@extends('layouts.admin')

@section('title', 'My Orders')

@section('content')


    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success mb-3"> {{ session('message') }} </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>My Order
                        <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm d-flex align-items-center float-end mx-1" data-toggle="tooltip" title="Back">
                            <i class="mdi mdi-arrow-left"></i>
                        </a>

                        {{-- <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm  text-white float-end mx-1">
                            <i class="mdi mdi-download"></i>Download Invoice
                        </a> --}}
                        <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm text-white float-end" data-toggle="tooltip" title="Download Invoice" >
                            <i class="mdi mdi-download"></i>
                        </a>

                        <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-sm  text-white float-end mx-1" data-toggle="tooltip" title="View Invoice">
                            <i class="mdi mdi-eye"></i>

                        </a>
                        <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}" target="_blank" class="btn btn-info btn-sm  text-white float-end mx-1" data-toggle="tooltip" title="Send Invoice Via Mail">
                            <i class="mdi mdi-send"></i>
                        </a>
                    </h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id: {{ $order->id }}</h6>
                            <h6>Tracking Id/No.: {{ $order->tracking_no }}</h6>
                            <h6>Ordered Created Date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                            <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                            <h6 class="border p-2 text-success">
                                Order Status Message: <span class="text-uppercase">{{ $order->status_message }}</span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name: {{ $order->fullname }}</h6>
                            <h6>Email Id: {{ $order->email }}</h6>
                            <h6>Phone: {{ $order->phone }}</h6>
                            <h6>Address: {{ $order->address }}</h6>
                            <h6>Pincode: {{ $order->pincode }}</h6>
                        </div>
                    </div>
                    <br>
                    <h5>Order Items</h5>
                    <hr>
                    <div class="col-md-12">
                        <div class="shadow bg-white p-3">
                            <h4 class="mb-4"> My Orders </h4>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <th>Item ID</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($order->orderItems as $orderItem)
                                            <tr>
                                                <td width="10%">{{ $orderItem->id }}</td>
                                                <td width="10%">
                                                    @if ($orderItem->product->productImages)
                                                        <img src=" {{ asset($orderItem->product->productImages[0]->image) }}"
                                                            style="width: 50px; height: 50px" alt="">
                                                    @else
                                                        <img src="" style="width: 50px; height: 50px"
                                                            alt="">
                                                    @endif

                                                </td>
                                                <td width="10%">
                                                    {{ $orderItem->product->name }}

                                                    @if ($orderItem->productColor)
                                                        @if ($orderItem->productColor->color)
                                                            <span>with Color:
                                                                {{ $orderItem->productColor->color->name }}</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td width="10%">{{ $orderItem->price }}</td>
                                                <td width="10%">{{ $orderItem->quantity }}</td>
                                                <td width="10%" class="fe-bold">
                                                    {{ $orderItem->quantity * $orderItem->price }}</td>
                                                @php
                                                    $totalPrice += $orderItem->quantity * $orderItem->price;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" class="fe-bold">Total Amount:</td>
                                            <td colspan="1" class="fe-bold">{{ $totalPrice }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Order Process (Order Status Updates)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('/admin/orders/'.$order->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <label> Update Your Status </label>
                                <div class="input-group">
                                    <select name="order_status" class="form-select">
                                        <option value=""> Select Order Status </option>
                                        <option value="in progress">In Progress
                                            {{ Request::get('status') == 'in progress' ? '✓' : '' }}</option>
                                        <option value="completed">Completed
                                            {{ Request::get('status') == 'completed' ? '✓' : '' }}</option>
                                        <option value="pending">Pending
                                            {{ Request::get('status') == 'pending' ? '✓' : '' }}</option>
                                        <option value="cancelled">Cancelled
                                            {{ Request::get('status') == 'cancelled' ? '✓' : '' }}</option>
                                        <option value="out-of-delivery">Out for Delivery
                                            {{ Request::get('status') == 'out-of-delivery' ? '✓' : '' }}</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white"> Update </button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-7">
                            <br>
                            <h4 class="mt-3"> Current Order Status: <span class="text-uppercase">
                                    {{ $order->status_message }} </span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
