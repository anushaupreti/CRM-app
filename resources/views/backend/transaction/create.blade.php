@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/transaction" class="btn btn-primary btn-sm">Transaction</a>
                </div>
                <div class="card-body">
                    <form action="/transaction" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="renew_date">Purchase Date</label>
                            <select class="form-control" aria-label="Default select example" name="renew_date">
                                @foreach ($purchase as $p)
                                <option value="{{ $p->id }}">{{$p ->created_at }}</option>
                                @endforeach
                            </select>
                            {{-- <label for="renew_date">Purchase Date</label> --}}
                            {{-- @foreach ($purchase as $p)
                            <input type="text" class="form-control" name="{{ $p->id }}" id="renew_date" value="{{ $p->days }}">
                            @endforeach --}}
                            {{-- <input id="date" class="form-control" type="date" name="renew_date"> --}}
                        </div>

                        <div class="form-group">
                            <label for="customer_id" class="form-label">Customer Name<span class="text-danger">*</span></label>
                            <select class="form-control" aria-label="Default select example" name="customer_id">
                                @foreach ($customer as $c)
                                <option value="{{ $c->id }}">{{ $c ->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                           <label for="service_id" class="form-label">Service<span class="text-danger">*</span></label>
                           <select class="form-control" arial-label="Default select example" name="service_id">
                               @foreach ($service as $s)
                                   <option value="{{ $s->id }}">{{ $s ->name }}</option>
                               @endforeach
                           </select>
                        </div>

                        <div class="form-group">
                            <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                            <select class="form-control" arial-label="Default select example" name="price">
                                @foreach ($service as $s)
                                    <option value="{{ $s->id }}">{{ $s ->price }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="renew_date" class="form-label">Renew Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="renew_date" id="renew_date" value="{{ Carbon\Carbon::now()->addDays(7)->format('Y-m-d') }}">
                        </div> --}}

                        <div class="form-group">
                          <label for="expire_date" class="form-label">Expire Date <span class="text-danger">*</span></label>
                            <select class="form-control" aria-label="Default select example" name="expire_date">
                                @foreach ($purchase as $p)
                                <option value="{{ $p->id }}">{{$p ->days }}</option>
                                @endforeach
                            </select>
                            {{-- <label for="expire_date" class="form-label">Expire Date <span class="text-danger">*</span></label>
                            @foreach ($purchase as $p)
                            <input type="text" class="form-control" name="{{ $p->id }}" id="expire_date" value="{{ $p->days }}">
                            @endforeach --}}
                        </div>

                        {{-- <div class="form-group">
                            <label for="user_id" class="form-label">User Id <span class="text-danger">*</span></label>

                            <input type="text" class="form-control" name="user_id" id="user_id" value="{{ Auth::user()->name }}">

                            <input type="text" class="form-control" name="user_id" id="user_id" value="">
                        </div> --}}


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
