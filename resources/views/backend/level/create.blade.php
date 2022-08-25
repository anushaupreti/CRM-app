@extends('backend.app')
@section('heading')
    Create Level
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <a href="/level" class="btn btn-primary btn-sm">View All Levels</a>
                </div>
                <div class="card-body">
                    <form action="/level" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="service_id">Service Name</label>
                            <select name="service_id" class="form-control">
                                @foreach ($service as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="levelname">Which Level</label>
                            {{-- <select name="levelname" class="form-control">
                                <option value="">Level-1</option>
                                <option value="">Level-2</option>
                                <option value="">Level-3</option>
                                <option value="">Level-4</option>
                                <option value="">Level-5</option>
                            </select> --}}
                            <input name="levelname" id="levelname" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="start date">Start Date</label>
                            <input name="start_date" id="start_date" class="form-control" type="date">
                        </div>
                        <div class="form-group">
                            <label for="end date">End Date</label>
                            <input name="end_date" id="end_date" class="form-control" type="date">
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration of Level</label>
                            <input name="duration" id="duration" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input name="price" id="price" class="form-control" type="text">
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
