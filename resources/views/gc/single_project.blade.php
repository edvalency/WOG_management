@extends('layouts.main')

@section('balance')
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
                                <h4>{{ $project }}</h4>
                                <h4 id='amount'></h4>
                            </div>

                            <div class="card-body">
                                <a href="{{route('gccontrib.show')}}" class="btn btn-outline-warning mr-3 mb-3">Go Back</a>
                                <button type="button" class="btn btn-outline-success mb-3" data-toggle="modal"
                                        data-target="#contribution">Add Contribution</button>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Fullname</th>

                                            <th>Amount</th>
                                        </tr>
                                        <tbody id='expenselist'>
                                            @foreach ($data as $key => $exp)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ date('d F Y', strtotime($exp->created_at)) }}</td>
                                                    <td>{{ $exp->fullname }}</td>
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
    <div class="modal fade" id="contribution" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Enter Contribution</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" action='{{route('gc_contribution')}}' method="post">
                        @csrf
                        <input type="text" name="project" value="{{$project}}" id="">
                        <div class="form-group">
                            <label for="desc">Enter Name of Contributor</label>
                            <input type="text" class="form-control" name="fullname" id="">
                            <div class="form-group mt-3">
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
                        </div>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Enter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Vertically Center end -->
@endsection
