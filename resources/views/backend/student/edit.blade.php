@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/student" class="btn btn-primary btn-sm">All Student</a>
                </div>
                <div class="card-body">
                    <form action="/student/{{ $students->id }}" method="post">
                        
                        <div class="form-group">
                          <label for="name" class="form-label">Student Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="name" id="name" value="{{ $students->name }}">
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="form-label">Mobile <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $students->mobile }}">
                         </div>
                        <div class="form-group">
                           <label for="email" class="form-label">email <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="email" id="email" value="{{ $students->email }}">
                        </div>

                        <div class="form-group">
                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ $students->address }}">
                        </div>

                        <div class="form-group">
                            <label for="company_contact" class="form-label">Course <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="service_id" id="service_id" value="{{ $students->service_id }}">
                        </div>

                        <div class="form-group">
                            <label for="total_fee" class="form-label">Total Fees <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="total_fee" id="total_fee" value="{{ $students->total_fee }}">
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
