@extends('backend.app')
@section('heading')
    Payment
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <a href="/payment" class="btn btn-primary btn-sm">Payment</a>
                </div>
                <div class="card-body">
                    <form action="/payment" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="date">Payment Date</label>
                            <input id="date" class="form-control" type="date" name="date">
                        </div>

                        {{-- @livewire('student-service-level',['selectedLevel' => 1]) --}}
                        <div class="form-group">
                            <label for="student_id">Student Name</label>
                            <select class="form-control" name="student_id" id="student">
                                <option selected disabled> Select Student </option>
                                @foreach ($student as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="service_id">Service Name</label>
                            <select class="form-control" name="service_id" id="service">
                                {{-- <option selected disabled> </option> --}}
                                {{-- @foreach ($student as $s)
                                    <option value="{{ $s->service_id }}">{{ $s->service->name }} | charge {{ $s->price }}</option>
                                @endforeach --}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="service_id">Level Name</label>
                            <select class="form-control" name="level_id" id="level">
                                {{-- @foreach ($level as $l)
                                    <option value="{{ $l->id }}">{{ $l->levelname }}</option>
                                @endforeach --}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="paid" class="form-group">Paid</label>
                            <input type="text" class="form-control" name="paid">
                        </div>
                        <small class="text-danger">{{ $errors->first('paid') }}</small>
                        <button type="submit" class="btn btn-primary" id="status">Add</button>
                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#student').on('change', function() {
                var studentId = this.value;
                $('#service').html('');
                $.ajax({
                    url: '{{ route('student.index') }}?student_id=' + studentId,
                    type: 'get',
                    success: function(res) {
                        $('#service').html('<option value = "">Select Service</option>');
                        $.each(res, function(key, value) {
                            $('#service').append('<option value ="' + service_id + '">' +
                                service.name + '</option>');
                        });
                        $('#level').html('<option value="">Select Level</option>');
                    }

                });
            });
            $('#service').on('change', function() {
                var serviceId = this.value;
                $('#level').html('');
                $.ajax({
                    url: '{{ route('level.index') }}?service_id=' + serviceId,
                    type: 'get',
                    success: function(res) {
                        $('#level').html('<option value="">Select Level</option>');
                        $.each(res, function(key, value) {
                            $('#level').append('<option value="' + value.id + '">' +
                                value.levelname + '<option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
