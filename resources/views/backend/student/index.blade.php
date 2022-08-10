@extends('backend.app')
@section('heading')
  Student
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/student/create" class="btn btn-primary btn-sm">Add-Student</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                        <th>SN</th>
                        <th>Student Name</th>
            
                        <th>Total_fee</th>
                        <th>Admission Date</th>
                        <th>Paid</th>
                        <th>Remaining</th>
                        <th>Total</th>
                    </tr>
                    @foreach ($payment as $r)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        {{-- <td>{{$r->service->created_at->format('Y-m-d')}}</td> --}}
                        <td>{{$r->name}}</td>
                        <td>{{$r->email}}</td>
                        <td>{{$r->servicename}}</td>
                        <td>{{$r->paid}}</td>
                        <td>{{$r->price-$r->total}}</td> 
                        <td>{{$r->price}}</td>                           
                        {{-- <td class="row">
                            <a href="/payment/{{ $r->id }}/edit" class="badge badge-primary m-1">Edit</a>
                            <form action="/payment/{{ $r->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a class="badge badge-danger mt-0" type="submit">Delete</a>
                            </form>
                        </td> --}}

                    </tr>

                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
