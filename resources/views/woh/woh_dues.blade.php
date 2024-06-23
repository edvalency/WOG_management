@extends('layouts.main')
@section('wohdown')
active
@endsection
@section('wohdues')
    active
@endsection
@section('search')
<li>
    <form class="form-inline mr-auto" method="POST" action="{{ route('gc_dues.search') }}">
        @csrf
        <div class="search-element">
            <input class="form-control" type="search" id="search" placeholder="Search" aria-label="Search"
                data-width="200">
            <button class="btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
</li>
@endsection
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <!-- add content here -->
            <div class="row " id="allmembers">
                <div class="col-6 container">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="">Dues Payments</h3>
                        </div>
                        <div class="card-body">
                            <h4 class="justify-content-center d-flex mb-5">Names</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    @foreach ($member as $key => $value)
                                        <tr>
                                            <td>{{ $value->fullname }}</td>
                                            <td><a href="{{ route('woh_dues.single', ['name' => $value->mask]) }} "
                                                    class="btn btn-outline-dark">View Payments</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- content adding end -->

    </section>
</div>
@endsection
