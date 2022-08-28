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
                        <table class="table table-responsive">
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Admission Date</th>
                                <th>Course</th>
                                {{-- <th>Paid</th> --}}
                                <th>Total</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($student as $r)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    {{-- <td>{{$r->service->created_at->format('Y-m-d')}}</td> --}}
                                    <td>{{ $r->name }}</td>
                                    <td>{{ $r->email }}</td>
                                    <td>{{ $r->mobile }}</td>
                                    <td>{{ $r->address }}</td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($r->created_at)) }}
                                    </td>
                                    <td>{{ $r->service->name }}</td>
                                    {{-- <td>{{$r->paid}}</td>
                        <td>{{$r->price-$r->total}}</td> --}}
                                    <td>{{ $r->total_fee }}</td>
                                    <td> <a class="badge badge-info badge-pill p-2" href="/student/{{ $r->id }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="/student/{{ $r->student_id }}" method="POST">
                                            <a href="/student/{{ $r->student_id }}/edit"
                                                class="badge badge-primary m-1 badge-pill p-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @method('DELETE')
                                            @csrf
                                            <a class="badge badge-danger mt-0 badge-pill p-2" type="submit">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
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
