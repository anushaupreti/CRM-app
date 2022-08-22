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
                    <form action="{{route('level.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="service_id">Service Name</label>
                            <select class="form-control" name="student_id" type="text">
                                @foreach ($service as $s)
                                 <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="level_name">Which Level</label>
                            <select class="form-control" name="level_name" type="text" id="">
                                <option value="">Level-1</option>
                                <option value="">Level-2</option>
                                <option value="">Level-3</option>
                                <option value="">Level-4</option>
                                <option value="">Level-5</option>
                            </select>
                            {{-- <input id="level_name" class="form-control" type="text" name="level_name"> --}}
                        </div>
                        <div class="form-group">
                            <label for="start date">Start Date</label>
                            <input id="start_date" class="form-control" type="date" name="start_date">
                        </div>
                        <div class="form-group">
                            <label for="end date">End Date</label>
                            <input id="end_date" class="form-control" type="date" name="end_date">
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration of Level</label>
                            <input id="duration" class="form-control" type="text" name="duration">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input id="price" class="form-control" type="text" name="price">
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message')}}</div>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
