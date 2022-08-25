@extends('backend.app')
@section('heading')
    Edit Level
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <a href="/level" class="btn btn-primary btn-sm">View All Levels</a>
                </div>
                <div class="card-body">
                    <form action="/level/{{ $levels->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="service_id">Service Name</label>
                            <select class="form-control" name="service_id" type="text">
                                @foreach ($service as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="level_name">Which Level</label>
                            {{-- <select class="form-control" name="level_name" type="text" id=""
                                value={{ $levels->levelname }}>
                                <option value="">Level-1</option>
                                <option value="">Level-2</option>
                                <option value="">Level-3</option>
                                <option value="">Level-4</option>
                                <option value="">Level-5</option>
                            </select> --}}
                            <input id="levelname" class="form-control" type="text" name="levelname"
                                value={{ $levels->levelname }}>
                        </div>

                        <div class="form-group">
                            <label for="start date">Start Date</label>
                            <input id="start_date" class="form-control" type="date" name="start_date"
                                value="{{ $levels->start_date }}">
                        </div>
                        <div class="form-group">
                            <label for="end date">End Date</label>
                            <input id="end_date" class="form-control" type="date" name="end_date"
                                value="{{ $levels->end_date }}">
                        </div>
                        <div class="form-group">
                            <label for="service_id">Duration of Level</label>
                            <input id="duration" class="form-control" type="text" name="duration"
                                value="{{ $levels->duration }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input id="price" class="form-control" type="text" name="price"
                                value="{{ $levels->price }}">
                        </div>

                        {{-- <small class="text-danger">{{$errors->first('paid')}}</small> --}}
                        <button type="submit" class="btn btn-primary">Update</button>
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
