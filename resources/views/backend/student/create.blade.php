@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/student" class="btn btn-primary btn-sm">All Students</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="name" class="form-label">Student Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="name" id="name" value="">
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="form-label">Mobile <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile" id="mobile" value="">
                         </div>
                        <div class="form-group">
                           <label for="email" class="form-label">email <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="email" id="email" value="">
                        </div>

                        <div class="form-group">
                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" id="address" value="">
                        </div>

                        <div class="form-group">
                            <label for="course" class="form-label">Course <span class="text-danger">*</span></label>
                            <select class="form-control" name="course" id="">
                                @foreach($services as $s)
                                <option value="{{$s->name}}">{{$s->name}} | {{$s->price}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="total_fee" class="form-label">Total Fees <span class="text-danger">*</span></label>
                            <input type="number " class="form-control" name="total_fee" id="total_fee" value="">
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
