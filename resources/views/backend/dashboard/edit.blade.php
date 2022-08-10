@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card-header">
                    <a href="/dashboard" class="btn btn-primary btn-sm">Message</a>
                </div>
                <div class="card-body">
                    <form action = "/dashboard/{{ $purchase->id }}" method ="post" >
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" name="mobile" placeholder="Enter mobile number" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message"  class="form-control" placeholder="Enter sms content"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

