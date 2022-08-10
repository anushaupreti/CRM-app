@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/purchase" class="btn btn-primary btn-sm">Purchase</a>
                </div>
                <div class="card-body">
                    <form action="/purchase" method="post">
                        @csrf
                        {{-- @if ($errors->any())
                       @foreach ($errors->all() as $error)
                      <div>{{$error}}</div>
                       @endforeach
                       @endif --}}

                        <div class="form-group">
                            <label for="date">Purchase Date</label>
                            <input id="date" class="form-control" type="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="customer_id">Student</label>
                            <select class="form-control" aria-label="Default select example" name="customer_id">
                            @foreach ($student as $s)
                             <option value="{{$s->id}}">{{$s->name }}</option>
                              @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="service_id">Service Name</label>
                            <select class="form-control" aria-label="Default select example" name="service_id">
                                @foreach ($service as $s)
                                <option value="{{ $s->id }}">{{$s ->name }} | Charge {{$s->price}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="paid" class="form-label">Paid</label>
                            <input type="text" class="form-control" name="paid" >
                        </div> --}}
                        {{-- <small class="text-danger">{{ $errors->first('paid') }}</small> --}}
                        <div class="form-group">
                            <label for="days" class="form-label">Days</label>
                            <input type="number" class="form-control" name="days" value="">
                            {{-- <input type="number" class="form-control" name="days" value="{{ Carbon::createFromFormat('Y-m-d H:i:s', $request->days)->format('d-m-Y') }}"> --}}

                        </div>
                        {{-- <div class="form-group">
                            <label for="date">days</label>
                            <input id="date" class="form-control" type="date" name="date">
                        </div> --}}
                        <small class="text-danger">{{ $errors->first('days') }}</small>

                        <button type="submit" class="btn btn-primary">Add</button>
                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif
                       </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
