@extends('layouts.main')
@section('tithe')
    active
@endsection
@section('search')
<li>
  <form class="form-inline mr-auto" method="POST" action="{{route('tithes.search')}}">
    @csrf
    <div class="search-element">
      <input class="form-control" type="search" id="search"  placeholder="Search" aria-label="Search" data-width="200" name="search" >
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
          <div class="card" >
            <div class="card-header">
              <h3 class="" id="num">Tithe Payments</h3>
            </div>
            <div class="card-body">
              <h4 class="justify-content-center d-flex mb-5">Names</h4>
              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  @foreach ($member as $key=>$value)
                  <tr>
                    <td>{{$value->fullname}}</td>
                    <td><a href="{{route('tithes.single',['name'=>Crypt::encrypt($value->id)])}} " class="btn btn-dark">View Payments</a></td>
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
   <!-- Vertically Center -->
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Enter Member's tithe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form class="" action='#' method="post">
            <div class="form-group">
              <label>Enter amount</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-coins"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="amount" name="amount" id="amount" autofocus>
              </div>
            </div>
            <button type="button" class="btn btn-primary m-t-15 waves-effect" id="record">Record</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Vertically Center end -->
    
@endsection

