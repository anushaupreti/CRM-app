@extends('backend.app')
@section('heading')
Detail Transactions of
{{-- @foreach($payment as $row) --}}
    {{-- <span class="text-bold">{{ $payment->name }}</span> --}}
{{-- @endforeach --}}
<h4>Course Assign: {{$service->count()}} </h4>
@endsection
@section('content')
<div class="container">
    <div class="row">
        @foreach($payment as $r)
            <div class="col-3">
                <div class="card bg-info pt-2" style="width:200px">
                    <div class="card-body">
                        <h4 class="card-title text-bold">Service: {{ $r->servicename }}</h4><br>
                        <h5>Total Amount: {{ $r->price }}</h5>
                        <h5>Total Paid:{{ $r->paid }}</h5>
                        <h5>Remaining:{{ $r->price-$r->paid }}</h5>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <a href="#" class="btn btn-primary btn-sm">All Transactions of <span class="text-bold">{{ $payment->first()->name}} </span> --}}
                    </a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Date</th>
                            <th>Student Name</th>
                            <th>Service</th>
                            <th>Service Charge</th>
                            <th>Paid Amount</th>
                            {{-- <th>User Id</th> --}}
                            <th>Action</th>
                        </tr>
                        @foreach($payment as $row)
                            <tr>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->servicename }}</td>
                                <td>{{ $row->price }}</td>
                                <td>{{ $row->paid }}</td>
                                <td>
                                    <a href="#" class="badge bg-primary p-2">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
