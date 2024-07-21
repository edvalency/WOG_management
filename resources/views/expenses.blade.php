@extends('layouts.main')

@section('balance')
    <li class="">
        <div class="mr-5">
            <span>Current total expenses</span>
            <h5 class="mb-3 font-18" id="sumoffunds">₵ {{ $total }}</h5>
        </div>
    @endsection

    @section('content')
        <div class="main-content">
            <section class="section">
                <div class="row justify-content-evenly">
                    <!-- add content here -->
                    <div class="card col-6 col-sm-8">
                        <div class="card-header">
                            <h4>Current Expenses</h4>
                            <h4 id='amount'></h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                data-target="#exampleModalCenter">Add Expense</button>
                            <a href="#" class="btn btn-outline-dark ml-5 water"> View water bills</a>
                            <a class="btn btn-outline-dark ml-1 prepaid"> View prepaid bills</a>
                            <a class="btn btn-outline-dark ml-1 allowances"> View allowances</a>
                            <a class="btn btn-outline-dark ml-1 misc"> View miscellaneous expenses</a>
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
                        <div class="form-group">
                            <label for="" class="mr-3">Select Expense type</label>
                            <input type="radio" name="expense_type" id="water" value="water bill">
                            <label for="">Water bill</label>
                            <input type="radio" name="expense_type" id="prepaid" value="prepaid bill">
                            <label for="">Prepaid bill</label>
                            <input type="radio" name="expense_type" id="allowance" value="allowance">
                            <label for="">Allowance</label>
                            <input type="radio" name="expense_type" id="misc" value="miscellaneous">
                            <label for="">Miscellaneous</label>
                        </div>
                        <label for="desc">Enter Expense details</label>
                    </div>

                    <div class="modal-body" id="water">
                        <form class="" action='{{ route('expense.store') }}' method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter date paid</label>
                                <input type="date" name="date" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label>Enter amount</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-coins"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="name form-control" placeholder="amount" name="amount"
                                        required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Enter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertically Center end -->

        <div class="modal-body" id="misc">
            <form class="" action='{{ route('expense.store') }}' method="post">
                @csrf
                <div class="form-group">
                    <label for="">Enter description</label>
                    <textarea name="desc" id="" cols="30" rows="10" class="form-control mb-3" required></textarea>
                    <label>Enter amount</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-coins"></i>
                            </div>
                        </div>
                        <input type="text" class="name form-control" placeholder="amount" name="amount" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Enter</button>
            </form>
        </div>

        {{-- <script>
            // $('#test').hide();

            console.log($('#select').find('option:selected'));
        </script> --}}
        <script src="js/expense.js"></script>
    @endsection
