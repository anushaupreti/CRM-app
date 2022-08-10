@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/service" class="btn btn-primary btn-sm">service</a>
                </div>
                <div class="card-body">
                    <form action="/service/{{ $service->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label for="name" class="form-label">service Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="name" id="name" value="{{ $service->name }}">
                        </div>


                        <div class="form-group">
                           <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="price" id="price" value="{{ $service->price }}">
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
