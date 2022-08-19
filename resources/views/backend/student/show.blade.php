@extends('backend.app')
@section('heading')
  Detail Transactions of  
  @foreach ($payment as $row)
     <span class="text-bold">{{$row->name}}</span>
     <h4>Course Assign : </h4>
  @endforeach
@endsection
@section('content')
@foreach ($payment as $r)
<div class="container">
   <div class="row">
     <div class="col">
        <div class="card bg-info pt-2" style="width:200px">
          <div class="card-body">
            <h4 class="card-title text-bold">ServiceName:  {{$r->servicename}}</h4>
            {{-- <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p> --}}
            <h5>Total Amount: {{$r->price}}</h5>
            <h5>Total Paid:{{$r->paid}}</h5>
            <h5>Remaining:{{$r->price-$r->paid}}</h5> 
          </div>
        </div>
      </div>
   </div>
</div>
@endforeach

<div class="container">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <a href="/transaction/create" class="btn btn-primary btn-sm">All Transactions of  @foreach ($payment as $row)
                    <span class="text-bold">{{$row->name}}</span>
                    {{-- <h4>Course Assign : </h4> --}}
                 @endforeach </a>
              </div>
              <div class="card-body">
                  <table class="table">
                      <tr>
                      <th>Date</th>
                      <th>Student Name</th>
                      <th>Service</th>
                      <th>Price</th>
                      {{-- <th>Renew Date</th> --}}
                      <th>Expire Date</th>
                      <th>User Id</th>
                      <th>Action</th>
                  </tr>
                  {{-- @foreach ($transaction as $r) --}}
                      <tr>
                          {{-- <td>{{$r->renew_date}}</td> --}}
                          {{-- <td>{{$r->student->name}}</td> --}}
                          {{-- <td>{{$r->service->name}}</td> --}}
                          {{-- <td>{{$r->service->price}}</td> --}}
                          {{-- <td>{{$r->renew_date}}</td> --}}
                          {{-- <td>{{$r->expire_date }}</td> --}}
                          {{-- <td>{{$r->user_id }}</td> --}}
                          <td>
                              {{-- <a href="/transaction/{{ $r->id }}/edit" class="badge bg-primary">Edit</a> --}}
                          </td>
                      </tr>
                  {{-- @endforeach --}}
                  </table>
              </div>
          </div>
      </div>
  </div>

</div>
@endsection
