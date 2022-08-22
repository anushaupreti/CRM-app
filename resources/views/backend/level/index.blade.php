@extends('backend.app')
@section('heading')
    Service Levels
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
            @endif
                <div class="card-header">
                    <a href="/level/create" class="btn btn-primary btn-sm">Add Levels</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>SN</th>
                            <th>Service Name</th>
                            <th>Level Name</th>
                            <th>Level Duration</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total Price</th>
                            <th>Actions</th>
                        </tr>

                        @foreach ($levels as $row)
                        <tr>
                            <td>{{$loop->index+1}}</td> 
                            <td>{{$row->service->first()->name}}</td> 
                            <td>{{$row->level_name}}</td>
                            <td>{{$row->duration}}</td>
                            <td>{{$row->start_date}}</td>
                            <td>{{$row->end_date}}</td>
                            <td>{{$row->price}}</td>
                            <td class="row">
                                <a href="/level/{{ $row->id }}/edit" class="badge badge-primary mr-1 p-2">Edit</a>
                                <form action="/level/{{ $row->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="badge badge-danger mt-0 padge-pill p-2" type="submit">Delete</a>
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
