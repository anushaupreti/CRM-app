@extends('backend.app')
@section('heading')
    Dashboard
@endsection
@section('content')
    <div class="container">
        <div class="row">
            {{-- Renew alert --}}
            <div class="col-md-8">
                <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Renew Alert</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>SN</th>
                        <th>Company</th>
                        <th>Service </th>
                        <th>Contact Person</th>
                        <th>Number</th>
                        <th>Expire Days</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody style="color: white">
                        @foreach ($purchase as $r)
                        @if($now->diffInDays($r->days) <=30)
                        @if($now->diffInDays($r->days) <=15)
                        <tr style="background:rgb(224, 44, 44)">
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $r->customer->company}}</td>
                            <td>{{ $r->service->name}}</td>
                            <td>{{ $r->customer->contact_person }}</td>
                            <td>{{ $r->customer->company_contact }}</td>
                            <td>{{$now->diffInDays($r->days)}}
                          </td>
                            <td>
                                {{-- <span class="badge badge-success">Due Clear</span> --}}
                                <a href="" class="badge badge-primary"><span>Send Message</span></a>
                            </td>
                        </tr>
                        @elseif ($now->diffInDays($r->days) >=15 || $now->diffInDays($r->days) <=30)
                        <tr style="background:rgb(243, 174, 46)">
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $r->customer->company}}</td>
                            <td>{{ $r->service->name}}</td>
                            <td>{{ $r->customer->contact_person }}</td>
                            <td>{{ $r->customer->company_contact }}</td>
                            <td>{{$now->diffInDays($r->days)}}
                          </td>
                            <td>
                                {{-- <span class="badge badge-success">Due Clear</span> --}}
                                <a href="" class="badge badge-primary"><span>Send Message</span></a>
                            </td>
                        </tr>

                        @else
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $r->customer->company}}</td>
                            <td>{{ $r->service->name}}</td>
                            <td>{{ $r->customer->contact_person }}</td>
                            <td>{{ $r->customer->company_contact }}</td>
                            <td>{{$now->diffInDays($r->days)}}
                          </td>
                            <td>
                                {{-- <span class="badge badge-success">Due Clear</span> --}}
                                <a href="" class="badge badge-primary"><span>Send Message</span></a>
                            </td>
                        </tr>
                        @endif
                        @endif

                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>

              </div>
              <!-- /.card -->
            </div>
           {{-- end renew --}}

           {{-- dues alert --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header alert-warning">Dues Alert</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>SN</th>
                                <th>Customer Name</th>
                                <th>Service Name</th>
                                {{-- <th>date</th> --}}
                                <th>Dues</th>
                                {{-- <th>Expire Date</th> --}}
                                <th>Action</th>
                            </tr>
                            @foreach ($details as $r)
                            @if ($r->totalpaid!=$r->price)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $r->customername}}</td>
                                <td>{{ $r->servicename}}</td>
                                {{-- <td>{{$r->date}}</td> --}}
                                @if($r->totalpaid!=$r->price)
                                <td>{{ $r->price-$r->totalpaid}}
                                </td>

                                @endif
                                {{-- <td>{{ $r->dashboard->balance }}</td> --}}
                                {{-- <td>{{$r->created_at ->format('D/M/Y')}}</td> --}}
                                <td>
                                    <a href="">Print</a>
                                </td>
                            </tr>
                            @endif


                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            {{-- end dues --}}
        </div>
    </div>
@endsection
