@extends('backend.app')
@section('heading')
    Service Levels
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-header">
                    <a href="/level/create" class="btn btn-primary btn-sm">Add Level</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>SN</th>
                            <th>Service Name</th>
                            <th>Level Name</th>
                            <th>Level Duration</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total Price</th>
                            <th>Actions</th>
                            <th>Status</th>
                        </tr>

                        @foreach ($levels as $row)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $row->service->name }}</td>
                                <td>{{ $row->levelname}}</td>
                                <td>{{ $row->duration }}</td>
                                <td>{{ $row->start_date }}</td>
                                <td>{{ $row->end_date }}</td>
                                <td>{{ $row->price }}</td>
                                <td class="row">
                                    <a href="/level/{{ $row->id }}/edit" class="badge badge-primary mr-1 badge-pill p-2">Edit</a>
                                    {{-- <form method="POST" action="{{ route('level.destroy',$row->id) }}" >
                                        {{csrf_field()}}
                                        {{-- @csrf --}}
                                        {{-- @method('DELETE')
                                        <a class="badge badge-danger mt-0 badge-pill p-2" type="submit">Delete</a>
                                    </form> --}} 
                                    <form action="/purchase/{{ $row->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a class="badge badge-danger mt-0 p-2 badge-pill" type="submit">Delete</a>
                                    </form>
                                </td>
                                <td>
                                    <a class="badge badge-info mt-0 p-2 badge-pill" id="status" name=status type="submit">Active</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

{{-- <script>
   document.getElementById("status").addEventListener("click", function() {
		window.alert("You clicked me!");
	});
</script> --}}
@endsection

