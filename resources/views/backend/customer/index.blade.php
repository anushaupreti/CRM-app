@extends('backend.app')
@section('heading')
  Customer
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/customer/create" class="btn btn-primary btn-sm">Add-customers</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                        <th>SN</th>
                        <th>Customer Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Address</th>
                        <th>Company Contact</th>
                        <th>Contact Person</th>
                        <th>Contact Person Mobile</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($customer as $r)
                        <tr>
                            <td>{{$loop->index+1 }}</td>
                            <td>{{$r ->name}}</td>
                            <td>{{$r ->mobile}}</td>
                            <td>{{$r ->email}}</td>
                            <td>{{$r ->company}}</td>
                            <td>{{$r ->address}}</td>
                            <td>{{$r ->company_contact}}</td>
                            <td>{{$r ->contact_person}}</td>
                            <td>{{$r ->contact_person_mobile}}</td>

                            <td>{{$r->created_at ->format('D/M/Y')}}</td>
                            <td>
                                <a href="/customer/{{ $r->id }}/edit" class="badge bg-primary">Edit</a>
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
