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
                    <form action="/transaction/{{ $transaction->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label for="date" class="form-label">transaction Date <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="date" id="date" value="{{ $transaction->date }}">
                        </div>

                        <div class="form-group">
                            <label for="customer_id" class="form-label">Student Id<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="student_id" id="student_id" value="{{ $transaction->student_id }}">
                         </div>

                        <div class="form-group">
                           <label for="service_id" class="form-label">Service Id <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="service_id" id="service_id" value="{{ $transaction->service_id }}">
                        </div>

                        <div class="form-group">
                            <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ $transaction->price }}">
                         </div>

                         <div class="form-group">
                            <label for="renew_date" class="form-label">Renew Date <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="renew_date" id="renew_date" value="{{ $transaction->renew_date }}">
                         </div>

                         <div class="form-group">
                            <label for="expire_date" class="form-label">Expire Date <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="expire_date" id="expire_date" value="{{ $transaction->expire_date }}">
                         </div>

                         <div class="form-group">
                            <label for="user_id" class="form-label">User Id <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="user_id" id="user_id" value="{{ $transaction->user_id}}">
                         </div>


                        <button type="submit" class="btn btn-primary">Update</button>
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
