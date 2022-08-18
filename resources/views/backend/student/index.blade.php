@extends('backend.app')
@section('heading')
  Student
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/student/create" class="btn btn-primary btn-sm">Add-Student</a>
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
                        <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Admission Date</th>
                        <th>Courses</th>
                          {{-- <th>Paid</th>
                        <th>Remaining</th> --}}
                        <th>Total</th> 
                        <th colspan="2">Action</th>
                    </tr>
                    @foreach ($payment as $r)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        {{-- <td>{{$r->service->created_at->format('Y-m-d')}}</td> --}}
                        <td>{{$r->name}}</td>
                        <td>{{$r->email}}</td>
                        <td>{{$r->mobile}}</td>
                        <td>{{$r->address}}</td>
                        <td>{{$r->created_at}}</td>
                        <td>{{$r->servicename}}</td>
                        {{-- <td>{{$r->paid}}</td>
                        <td>{{$r->price-$r->total}}</td>  --}}
                        <td>{{$r->price}}</td> 
                        <td colspan="4">  
                            <a  class="badge badge-info padge-pill p-2" href="/student/{{ $r->student_id }}" >
                            View Details
                            </a>
                            {{-- <a href="/student/{{ $r->student_id }}/edit" class="badge badge-primary m-1 padge-pill p-2">Edit</a>
                            <form action="/student/{{ $r->student_id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a class="badge badge-danger mt-0 padge-pill p-2" type="submit">Delete</a>
                            </form> --}}
                        </td>  
                                                
                       </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Button trigger modal -->
  
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Detailed Transaction</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-responsive">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Admission Date</th>
                        <th>Course</th>
                        <th>Paid</th>
                        <th>Remaining</th>
                        <th>Total</th>
                        {{-- <th>Remaining</th> --}}
                        {{-- <th>Actions</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            {{-- <td>{{$loop->index+1}}</td> --}}
                            {{-- <td>{{$student->name}}</td> --}}
                            {{-- <td>{{$r->email}}</td>
                            <td>{{$r->mobile}}</td>
                            <td>{{$r->address}}</td>
                            <td>{{$r->created_at}}</td>
                            <td>{{$r->servicename}}</td>
                            <td>{{$r->paid}}</td>
                            <td>{{$r->price-$r->total}}</td> 
                            <td>{{$r->price}}</td>  --}}
                            {{-- <td>{{$r->price-$r->total}}</td> --}}
                        </tr>
                       
                    </tbody>
                  </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
        </div>
    </div>
@endsection
