@extends('layouts.main')
@section('welfare')
    active
@endsection
@section('welpayment')
    active
@endsection
@section('search')
    <li>
        <form class="form-inline mr-auto" method="POST" action="{{ route('welfare.search') }}">
            @csrf
            <div class="search-element">
                <input class="form-control" type="search" id="search" placeholder="search" aria-label="Serch" name="search"
                    data-width="200">
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
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 container">
            <div class="card">
                <div class="card-header">
                    <h3 class="">Welfare Payments</h3>
                </div>
                <div class="card-body">
                    <h4 class="justify-content-center d-flex mb-5">Names</h4>
                    <div class="table-responsive">
                        @if (count($member) == 0)
                            <p class="font-weight-bold font-20">No member with such name, please check spelling</p>
                        @endif
                        <table class="table table-bordered table-md">
                            @foreach ($member as $value)
                                <tr>
                                    <td>{{ $value->fullname }}</td>
                                    <td><a href="{{ route('welfare.single', ['name' => $value->mask]) }}"
                                            class="btn btn-outline-dark">View Payments</a>
                                        <a href="{{ route('welfare.support', $value->mask) }}"
                                            class="btn btn-outline-dark ml-5">Record financial support</a>
                                    </td>

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
