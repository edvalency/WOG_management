@extends('layouts.main')
@section('welfare')
    active
@endsection
@section('welexpense')
    active
@endsection

@section('content')
        <section class="section">
            <div class="section-body">
                <!-- single member welfare details -->

                <div class="card col-4 container" id="member_welfare">
                    <h4 class="align-self-center mt-3 mb-4" id='membername'></h4>
                    <div>
                        <a href="{{ route('welfare.expense') }}" class="btn btn-primary ml-4 mb-4"><i
                                class="fas fa-less-than"></i></a>
                        <!-- <button class="btn btn-success ml-2 mb-4">Record Payment</button> -->
                        <button type="button" class="btn btn-success ml-2 mb-4 " data-toggle="modal"
                            data-target="#exampleModalCenter">Record welfare support</button>
                    </div>
                    <div class="card-body">
                        <p class="font-weight-bold font-30 " style="text-align: center">{{ $member->fullname }}</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th>Date</th>
                                    <th>Purpose</th>
                                    <th>Amount</th>
                                </tr>
                                @if (count($results) == 0)
                                    <p style="text-align: center">No Support made yet</p>
                                @endif
                                <tbody">
                                    @foreach ($results as $value)
                                        <tr>
                                            <td>{{ date('d F Y', strtotime($value->created_at)) }}</td>
                                            <td>{{ $value->reason }}</td>
                                            <td>₵ {{ $value->amount }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                            <p id="norec"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Vertically Center -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Record Member's welfare support</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="" action='{{ route('welfaresupport.store') }}' method="post">
                            <div class="form-group">
                                <input type="text" name="mask" id="" value="{{ $member->mask }}"hidden>
                                @csrf
                                <label>Enter date</label>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control" name="date"
                                        autofocus>
                                </div>
                                <label>Enter amount</label>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-coins"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Amount" name="amount"
                                        id="amount" autofocus>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Purpose" name="reason"
                                        id="reason" autofocus>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect"
                                id="record">Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertically Center end -->

    <!-- single member welfare details -->
@endsection
