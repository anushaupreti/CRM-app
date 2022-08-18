@extends('backend.app')
@section('heading')
  Student Details
@endsection
@section('content')
<div class="container">
   {{-- {{ $student->name}} --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive">
                        <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Admission Date</th>
                        <th>Course</th>
                        <th>Course Charge</th>
                        <th>Paid</th>
                        <th>Remaining</th>
                    </tr>
                    @foreach ($payment as $r)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        {{-- <td>{{$r->service->created_at->format('Y-m-d')}}</td> --}}
                        <td>{{$r->name}}</td>
                        <td>{{$r->email}}</td>
                        <td>{{$r->mobile}}</td>
                        <td>{{$r->address}}</td>
                        <td>{{$r->created_at}}</td>
                        <td>{{$r->servicename}}</td>
                        <td>{{$r->price}}</td>
                        <td>{{$r->paid}}</td>
                        <td>{{$r->price-$r->paid}}</td> 
                    </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Button trigger modal -->
@endsection
