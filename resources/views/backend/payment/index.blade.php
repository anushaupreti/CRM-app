@extends('backend.app')
@section('heading')
    Payment
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
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
                            <th>Level</th>
                            <th>Paid</th>
                            {{-- <th>Remaining</th> --}}
                            <th>Actions</th>
                        </tr>

                        {{-- {{ $payment->students}} --}}
                        @foreach ($payment as $key => $contents)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $contents->created_at->format('Y-m-d') }}</td>
                                <td>{{ $contents->student->first()->name }}</td>
                                <td>{{ $contents->student->first()->email }}</td>
                                <td>{{ $contents->service->name }}</td>
                                <td>{{ $contents->level->levelname }}</td>
                                <td>{{ $contents->paid }}</td>
                                {{-- <td>{{$r->price-$r->total}}</td> --}}
                                <td class="row">
                                    <form action="/payment/{{ $contents->id }}" method="POST">
                                        <a href="/payment/{{ $contents->id }}/edit"
                                            class="badge badge-primary p-2 badge-pill">
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
@endsection
