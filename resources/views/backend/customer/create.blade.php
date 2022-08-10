@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/customer" class="btn btn-primary btn-sm">Customer</a>
                </div>
                <div class="card-body">
                    <form action="/customer" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="name" class="form-label">Customer Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="name" id="name" value="">
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="form-label">Mobile <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile" id="mobile" value="">
                         </div>
                         <div class="form-group">
                            {{-- <label>Multiple</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                              @foreach ($service as $s )
                              <option value="{{$s->id }}">{{$s->name }}</option>
                              @endforeach
                            </select>
                          </div> --}}
                        <div class="form-group">
                           <label for="email" class="form-label">email <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="email" id="email" value="">
                        </div>

                        <div class="form-group">
                            <label for="company" class="form-label">Company <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="company" id="company" value="">
                         </div>

                         <div class="form-group">
                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" id="address" value="">
                         </div>

                         <div class="form-group">
                            <label for="company_contact" class="form-label">Company Contact <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="company_contact" id="company_contact" value="">
                         </div>

                         <div class="form-group">
                            <label for="contact_person" class="form-label">Contact Person <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="contact_person" id="contact_person" value="">
                         </div>

                         <div class="form-group">
                            <label for="contact_person_mobile" class="form-label">Contact Person Mobile <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="contact_person_mobile" id="contact_person_mobile" value="">
                         </div>
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
