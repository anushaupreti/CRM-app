@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-header">
                    <a href="/payment" class="btn btn-primary btn-sm">Payment</a>
                </div>
                <div class="card-body">
                    <form action="/payment/{{ $payment->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="date">Payment Date</label>
                            <input id="date" class="form-control" name="date" value="{{ $payment->date}}">
                        </div>

                        <div class="form-group">
                            <label for="customer_id">Student Name</label>
                            <select class="form-control" name="customer_id" value="{{$payment->customer_id}}">
                            @foreach ($student as $s)
                            <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="service_id">Service Name</label>
                            <select class="form-control" name="service_id" value="{{$payment->service_id}}">
                                @foreach ($service as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="paid" class="form-label">Paid</label>
                            <input type="text" class="form-control" name="paid" value="{{$payment->paid}}">
                        </div>
                        <small class="text-danger">{{$errors->first('paid')}}</small>

                        <button type="submit" class="btn btn-primary">Update</button>
                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message')}}</div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
