@extends('layouts.admin')

@section('pagecontent')

    
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card-body">

                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Filter by Date</label>
                            <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d')}}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Filter by Status</label>
                            <select name="status" id="" class="form-select">
                                <option value="">Select All Status</option>
                                <option value="in progress" {{Request::get("status") == 'in progress' ? 'selected':''}}>In Progress</option>
                                <option value="completed" {{Request::get("status") == 'completed' ? 'selected':''}}>Completed</option>
                                <option value="pending" {{Request::get("status") == 'pending' ? 'selected':''}}>Pending</option>
                                <option value="cancelled" {{Request::get("status") == 'cancelled' ? 'selected':''}}>Cancelled</option>
                                <option value="out-for-delivery" {{Request::get("status") == 'out-for-delivery' ? 'selected':''}}>Out for delivery</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            </br>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>


                </form>

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
                                <td class="w-1/6 pr-4 text-blue-700 underline"><a href="{{ url('admin/orders/'.$o->id) }}" class="btn btn-primary">View</a></td>
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
@endsection
