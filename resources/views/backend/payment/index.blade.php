@extends('backend.app')
@section('heading')
    Payment
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
            @endif
                <div class="card-header">
                    <a href="/payment/create" class="btn btn-primary btn-sm">Add Payment</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>SN</th>
                            <th>Date</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Servicename</th>
                            <th>Paid</th>
                            {{-- <th>Remaining</th> --}}
                            <th>Actions</th>
                        </tr>
                        @foreach ($payment as $r)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$r->service->created_at->format('Y-m-d')}}</td>
                            <td>{{$r->student->name}}</td>
                            <td>{{$r->student->email}}</td>
                            <td>{{$r->service->name}}</td>
                            <td>{{$r->paid}}</td>
                            {{-- <td>{{$r->price-$r->total}}</td>                            --}}
                            <td class="row">
                                <a href="/payment/{{ $r->id }}/edit" class="badge badge-primary m-1">Edit</a>
                                <form action="/payment/{{ $r->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    {{-- <a class="badge badge-danger mt-0" type="submit">Delete</a> --}}
                                </form>
                            </td>

                        </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
