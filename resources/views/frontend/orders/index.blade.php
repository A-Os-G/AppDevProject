<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-m leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shodow m-3 bg-s text-m">
                            <div class="table-reponsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center border-m border-2">
                                            <th class="w-1/6 py-4">Order ID</th>
                                            <th class="w-1/6 py-4">Tracking NO.</th>
                                            <th class="w-1/6">Username</th>
                                            <th class="w-1/6">Payment Mode</th>
                                            <th class="w-1/6">Ordered Date</th>
                                            <th class="w-1/6">Status Message</th>
                                            <th class="w-1/3 pr-4">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($orders as $o)
                                        <tr class="text-center border-m border-2">
                                            <td class="w-1/6 py-2">{{$o->id}}</td>
                                            <td class="w-1/6">{{$o->tracking_no}}</td>
                                            <td class="w-1/6">{{$o->fullname}}</td>
                                            <td class="w-1/6">{{$o->payment_mode}}</td>
                                            <td class="w-1/6">{{$o->created_at->format('d-m-Y')}}</td>
                                            <td class="w-1/6">{{$o->status_message}}</td>
                                            <td class="w-1/6 pr-4 text-blue-700 underline"><a href="{{url('orders/'.$o->id)}}" class="btn btn-primary">View</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="" colspan="7">No Orders available</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                <Div class="">
                                    {{$orders->links()}}
                                </Div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>