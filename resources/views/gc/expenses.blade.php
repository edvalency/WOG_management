@extends('layouts.main')
@section('gcdown')
    active
@endsection
@section('gcexpense')
    active
@endsection

@section('balance')
    <li class="">
        <div class="mr-5">
            <span>Current total expenses</span>
            <h5 class="mb-3 font-18" id="sumoffunds">₵ {{ $total }}</h5>
        </div>
    @endsection

    @section('content')
        <br><br><br><br>
        <div class="main-content">


            <section class="section">
                <div class="section-body">
                    <!-- add content here -->
                    <div class="row ">
                        <div class="col-6 col-md-6 col-lg-6 container">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Current Expenses</h4>
                                    <h4 id='amount'></h4>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                        data-target="#exampleModalCenter">Add Expense</button>
                                    <a href="{{ route('expense.prev') }}" class="btn btn-outline-primary ml-5"> View
                                        Previous month expenses</a>
                                    <a href="{{ route('expense.all') }}" class="btn btn-outline-warning ml-1"> View all
                                        expenses</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-md">
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                            </tr>
                                            <tbody id='expenselist'>

                                                @foreach ($expense as $exp)
                                                    <tr>
                                                        <td>{{ date('d F Y', strtotime($exp->created_at)) }}</td>
                                                        <td>{{ $exp->description }}</td>
                                                        <td>{{ $exp->amount }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <p id="mty"></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- content adding end -->
                    
                </div>
        </div>
        </section>


        <!-- Vertically Center -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Enter Expense</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="" action='{{ route('gcexpense.store') }}' method="post">
                            @csrf <div class="form-group">
                                <label for="desc">Enter Expense details</label>
                                <textarea name="desc" id="" cols="30" rows="10" class="form-control" required></textarea>
                                <label>Enter amount</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-coins"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="amount" name="amount" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Enter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertically Center end -->
    @endsection
