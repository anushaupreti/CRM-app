@extends('backend.app')
@section('heading')
    Services
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/service/create" class="btn btn-primary btn-sm">Add-Services</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                        <th>SN</th>
                        <th>Service Name</th>
                        <th>Price</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($service as $r)
                        <tr>
                            <td>{{$loop->index+1 }}</td>
                            <td>{{$r->name}}</td>
                            <td>{{$r->price}}</td>
                            <td>{{$r->created_at ->format('D/M/Y')}}</td>
                            <td>
                                <a href="/service/{{ $r->id }}/edit" class="badge bg-primary">Edit</a>
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
