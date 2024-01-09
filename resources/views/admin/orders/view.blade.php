@extends('layouts.admin')

@section('pagecontent')

    
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session("message")}}</div>
            @endif
            <div class="card-header">
                <h4> Orders
                    <a href="{{ url('admin/orders') }}" class="btn btn-primary text-white btn-sm float-end btn-danger">BACK</a>
                </h4>
            </div>
                <div class="row text-black m-4 bg-white leading-loose p-4 rounded md:flex xl:flex sm:block justify-around">
                    <div class="col-md-6">
                        <h3 class="pb-2 underline">Order Details</h3>
                        <h6>Order Id: {{$order->id}}</h6>
                        <h6>Tracking No.: {{$order->tracking_no}}</h6>
                        <h6>Ordered Date: {{$order->created_at->format('d-m-Y h:i A')}}</h6>
                        <h6>Payment Mode: {{$order->payment_mode}}</h6>
                        <h6>Order Status Message: <span class="text-uppercase"> {{$order->status_message}}</h6>
                    </div>

                    <div class="col-md-6">
                        <h3 class="pb-2 underline">User Details</h3>
                        <h6>Full Name: {{$order->fullname}}</h6>
                        <h6>Email Id: {{$order->email}}</h6>
                        <h6>Phone: {{$order->phone}}</h6>
                        <h6>Address: {{$order->address}}</h6>
                        <h6>Pin Code: {{$order->pincode}}</h6>
                    </div>
                </div>
                <div>
                <div class="row m-4 bg-white p-4 rounded">
                    <h3 class="pb-2 underline"> Order Items</h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th class="w-1/6">Item ID</th>
                                <th class="w-1/4">Image</th>
                                <th class="w-1/5">Product</th>
                                <th class="w-1/5">Price</th>
                                <th class="w-1/6">Quantity</th>
                                <th class="w-1/3 pr-4">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach($order->orderItems as $o)
                            <tr class="text-center border-2 border-m">
                                <td class="">{{ $o->id }} </td>
                                <td class=" py-2">
                                    @if ($o->product->image)
                                        <img src="{{asset($o->product->image)}}" style="width: 100px; height: 80px" alt="">
                                    @endif
                                </td>
                                <td class="">{{ $o->product->name }}</td>
                                <td class="">{{ $o->price }}</td>
                                <td class="">{{ $o->quantity }}</td> 
                                <td class="pr-4">{{ $o->quantity * $o->price }}</td>
                                @php
                                    $totalPrice += $o->quantity * $o->price;
                                @endphp
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="fw-bold">Total Amount: </td>
                                <td colspan="1" class="fw-bold">{{$totalPrice}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4>Order process (Order Status Updates)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{url('admin/orders/'.$order->id)}}" method="Post">
                            @csrf
                            @method('PUT')
                                <label for="">Update Your Order Status</label>
                                <div class="input-group">
                                    <select name="order_status" class="form-select">
                                        <option value="">Select Order Status</option>
                                        <option value="in progress" {{Request::get("status") == 'in progress' ? 'selected':''}}>In Progress</option>
                                        <option value="completed" {{Request::get("status") == 'completed' ? 'selected':''}}>Completed</option>
                                        <option value="pending" {{Request::get("status") == 'pending' ? 'selected':''}}>Pending</option>
                                        <option value="cancelled" {{Request::get("status") == 'cancelled' ? 'selected':''}}>Cancelled</option>
                                        <option value="out-for-delivery" {{Request::get("status") == 'out-for-delivery' ? 'selected':''}}>Out for delivery</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br/>
                            <h4 class="mt-3">Current Order Status: <span class="text-uppercase">{{$order->status_message}}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection