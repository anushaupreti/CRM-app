@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/customer" class="btn btn-primary btn-sm">customer</a>
                </div>
                <div class="card-body">
                    <form action="/customer/{{ $customer->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label for="name" class="form-label">Customer Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="name" id="name" value="{{ $customer->name }}">
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="form-label">Mobile<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $customer->mobile }}">
                         </div>

                        <div class="form-group">
                           <label for="email" class="form-label">email <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="email" id="email" value="{{ $customer->email }}">
                        </div>

                        <div class="form-group">
                            <label for="company" class="form-label">Company <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="company" id="company" value="{{ $customer->company }}">
                         </div>

                         <div class="form-group">
                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ $customer->address }}">
                         </div>

                         <div class="form-group">
                            <label for="company_contact" class="form-label">Company Contact <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="company_contact" id="company_contact" value="{{ $customer->company_contact }}">
                         </div>

                         <div class="form-group">
                            <label for="contact_person" class="form-label">Contact Person <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="contact_person" id="contact_person" value="{{ $customer->contact_person}}">
                         </div>

                         <div class="form-group">
                            <label for="contact_person_mobile" class="form-label">Contact Person Mobile <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="contact_person_mobile" id="contact_person_mobile" value="{{ $customer->contact_person_mobile}}">
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
