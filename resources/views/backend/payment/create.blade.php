@extends('backend.app')
@section('heading')
    Payment
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <a href="/payment" class="btn btn-primary btn-sm">Payment</a>
                </div>
                <div class="card-body">
                    <form action="/payment" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="date">Payment Date</label>
                            <input id="date" class="form-control" type="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="student_id">Student Name</label>
                            <select class="form-control" name="student_id">
                                @foreach ($student as $s)
                                <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service_id">Service Name</label>
                            <select class="form-control" name="service_id">
                                @foreach ($service as $s)
                                <option value="{{$s->id}}">{{$s->name}} | charge {{$s->price}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                             <label for="paid" class="form-group">Paid</label>
                             <input type="text" class="form-control" name="paid">
                        </div>
                        <small class="text-danger">{{$errors->first('paid')}}</small>
                        <button type="submit" class="btn btn-primary">Add</button>
                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message')}}</div>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
