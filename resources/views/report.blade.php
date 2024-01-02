@extends('layouts.main')
@section('reportpg')
    active
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#search">
                Search 
            </button> --}}

            <div class="card col-lg-6 col-sm-10" id="search_card">
                <form action="{{ route('report.search') }}" class="form p-2" method="post">
                    @csrf
                    <div class="row justify-content-between align-items-center">
                        <div class="form-group mt-3 col-sm-12">
                            <label for="" class="font-18">Search</label>
                            <select name="search" id="" class="form-control" required>
                                <option value="">select</option>
                                <option value="tithes">Tithe</option>
                                <option value="offertories">Offertory</option>
                                <option value="welfares">Welfare</option>
                                <option value="expenses">Expenses</option>
                            </select>

                        </div>
                    </div>

                    <div class="row justify-content-between">
                        <div class="form-group col-6 d-flex align-items-center">
                            <label for="" class="mr-1 font-18 font-weight-bold">From</label>
                            <select name="month_from" id="" class="form-control mr-2" required>
                                <option value="">select month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <input type="number" name="year_from" class="form-control" value="{{ date('Y') }}" id="">
                        </div>
                        <div class="form-group col-6 d-flex align-items-center">
                            <label for="" class="mr-1 font-18 font-weight-bold">To</label>
                            <select name="month_to" id="" class="form-control mr-2">
                                <option value="">select month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <input type="number" name="year_to" class="form-control" value="{{ date('Y') }}" id="">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Load</button>
                </form>
            </div>

            {{-- @if (false)
                <script>
                    document.getElementById('search_card').style.display = "none";
                </script>
                <div class="card">

                </div>
            @elseif ()

            @endif --}}
        </section>
        <div class="col-12 col-sm-12 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>Chart</h4>
              </div>
              <div class="card-body">
                <div id="chart1" class="chartsh">
                </div>
                <div id="chart2" class="chartsh">
                </div>
                <div id="chart3" class="chartsh">
                </div>
              </div>
            </div>
          </div>
    </div>
    <!-- Modal -->
    {{-- <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="searchLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchLabel">Search parameters</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>

</div> --}}

<script src="/bundles/apexcharts/apexcharts.min.js"></script>
<script src="/js/reportsCharts.js"></script>
<script src="/js/reports.js"></script>

<script>
    chart('{{$type}}');
</script>
@endsection
