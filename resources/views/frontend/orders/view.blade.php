<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-m">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-3">
                <div class="col-md-12 flex justify-end">
                    <h4 class="text-m bg-s mr-4 p-1 hover:text-s hover:bg-m border-s border-2 rounded">
                        <a href="/orders" class="">Back</a>
                    </h4>
                </div>

                <div class="row text-m m-4 bg-s leading-loose p-4 rounded md:flex xl:flex sm:block justify-around">
                    <div class="col-md-6">
                        <h5 class="font-bold text-2xl pb-2 underline">Order Details</h5>
                        <h6>Order Id: {{$order->id}}</h6>
                        <h6>Tracking No.: {{$order->tracking_no}}</h6>
                        <h6>Ordered Date: {{$order->created_at->format('d-m-Y h:i A')}}</h6>
                        <h6>Payment Mode: {{$order->payment_mode}}</h6>
                        <h6>Order Status Message: <span class="text-uppercase"> {{$order->status_message}}</h6>
                    </div>

                    <div class="col-md-6">
                        <h5 class="font-bold text-2xl pb-2 underline">User Details</h5>
                        <h6>Full Name: {{$order->fullname}}</h6>
                        <h6>Email Id: {{$order->email}}</h6>
                        <h6>Phone: {{$order->phone}}</h6>
                        <h6>Address: {{$order->address}}</h6>
                        <h6>Pin Code: {{$order->pincode}}</h6>
                    </div>
                </div>
                <div>
                <div class="row text-m m-4 bg-s p-4 rounded">
                    <h5 class="font-bold text-2xl pb-2 underline"> Order Items</h5>
                    <table class="table">
                        <thead>
                            <tr class="text-center border-m border-2">
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
        </div>
    </x-slot>
</x-app-layout>