@extends('backend.app')
@section('heading')
  Transaction
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/transaction/create" class="btn btn-primary btn-sm">Add-Transaction</a>
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
                    @foreach ($transaction as $r)
                        <tr>
                            <td>{{$r->renew_date}}</td>
                            <td>{{$r->student->name}}</td>
                            <td>{{$r->service->name}}</td>
                            <td>{{$r->service->price}}</td>
                            {{-- <td>{{$r->renew_date}}</td> --}}
                            <td>{{$r->expire_date }}</td>
                            <td>{{$r->user_id }}</td>
                            <td>
                                <a href="/transaction/{{ $r->id }}/edit" class="badge bg-primary">Edit</a>
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
