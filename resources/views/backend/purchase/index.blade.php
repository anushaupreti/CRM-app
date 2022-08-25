@extends('backend.app')
@section('heading')
  Purchase
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a href="/purchase/create" class="btn btn-primary btn-sm">Add-purchases</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                        <th>SN</th>
                        {{-- <th>Customer Name</th> --}}
                        <th>Student Id</th>
                        <th>Service Name</th>
                        <th>Purchase Date</th>
                        <th>Expire Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($purchase as $r)
                        <tr>
                            <td>{{$loop->index+1 }}</td>
                            <td>{{$r ->student->name}}</td>
                            <td>{{$r ->service->name}}</td>
                            <td>{{$r->created_at->format('Y,M,d') }}</td>
                            <td>{{$r->days}}</td>

                            <td>
                                <a href="/purchase/{{ $r->id }}/edit" class="badge bg-primary m-1 p-2 badge-pill">Edit</a>
                                <form action="/purchase/{{ $r->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a class="badge badge-danger mt-0" type="submit">Delete</a>
                                </form>
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
