@extends('layouts.main')
@section('welfare')
    active
@endsection
@section('welexpense')
    active
@endsection
@section('search')
    <li>
        <form class="form-inline mr-auto" method="POST" action="{{ route('welfaresupport.search') }}">
            @csrf
            <div class="search-element">
                <input class="form-control" type="search" id="search" placeholder="search supported member"
                    aria-label="Search" name="search" data-width="200">
                <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </li>
@endsection
@section('content')
                <!-- add content here -->
                <div class="row " id="allmembers">
                    <div class="col-lg-6 col-sm-12 container">
                        <div class="card">
                          
                            <div class="card-body">
                                <h4 class="justify-content-center d-flex mb-5">Supported members</h4>
                                <div class="table-responsive" id="datatab">
                                    <table class="table table-bordered table-md">
                                        <thead>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Purpose</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </thead>
                                        @foreach ($member as $key => $value)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{date("D, d F Y", strtotime($value->created_at))}}</td>
                                                <td>{{ $value->fullname }}</td>
                                                <td>{{ $value->reason }}</td>
                                                <td>{{ $value->amount }}</td>
                                                <td><a href="http://" class="btn btn-primary"><i class="fas fa-pen"></i></a> | <a href="http://" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content adding end -->
@endsection
