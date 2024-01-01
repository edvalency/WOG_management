@extends('layouts.main')
@section('gcdown')
    active
@endsection
@section('gcoffering')
    active
@endsection
@section('balance')
<li class="">
  <div class="mr-5">
  <span>Current Balance</span>
  {{-- <h5 class="mb-3 font-18" id="sumoffunds">₵ {{ $totalOffering }}</h5> --}}
</div>
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <!-- add content here -->
                <div class="row ">
                    <div class="col-6 col-md-6 col-lg-6 container">
                        <div class="card">
                            <div class="card-header">
                                <h4>Offertory</h4>
                                <h4 id='amount'></h4>
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#exampleModalCenter">Add Offertory</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tbody id='offertorylist'>
                                            <tr>
                                                <th>Date</th>
                                                <th>Amount</th>
                                            </tr>
                                            @foreach ($data as $key=>$value)
                                                <tr>
                                                  <td width="400">{{ date('d F, Y',strtotime($value->created_at)) }}</td>
                                                  <td>{{ $value->amount }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"><i
                                                    class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1 <span
                                                    class="sr-only">(current)</span></a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content adding end -->
        </section>
    </div>
    <!-- Vertically Center -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Enter Offertory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" action='{{ route('gcoffering.store') }}' method="post">
                        @csrf
                        <div class="form-group">
                            <label>Enter amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="amount" name="amount">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success m-t-15 waves-effect">Enter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Vertically Center end -->
@endsection

</div>
<!-- General JS Scripts -->
<script src="/js/app.min.js"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="/js/custom.js"></script>
</body>
</html>
