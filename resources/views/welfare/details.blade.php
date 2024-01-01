@extends('layouts.main')
@section('welfare')
    active
@endsection
@section('welpayment')
    active
@endsection

@section('content')
 
        <section class="section">
            <div class="section-body">
              <h4 class="text-center">Member welfare</h4>
                <!-- single member welfare details -->

                <div class="card col-lg-6 col-sm-12 container" id="member_welfare">
                    <h4 class="align-self-center mt-3 mb-4" id='membername'></h4>
                    <div>
                        <a href="{{route('welfare.show')}}" class="btn btn-primary ml-4 mb-4"><i
                                class="fas fa-less-than"></i></a>
                        <!-- <button class="btn btn-success ml-2 mb-4">Record Payment</button> -->
                        <button type="button" class="btn btn-success ml-2 mb-4 " data-toggle="modal"
                            data-target="#exampleModalCenter">Record welfare</button>
                    </div>
                    <div class="card-body">
                      <p class="font-weight-bold font-30 " style="text-align: center">{{$name->fullname}}</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                               @if (count($results)==0)
                               <p style="text-align: center">No Payments made yet</p>
                               @endif
                                <tbody">
                                  @foreach ($results as $value)
                                  <tr>
                                    <td>{{date('d F Y',strtotime($value->created_at))}}</td>
                                    <td>{{$value->amount}}</td>
                                    <td><a href="{{route('welfare.delete', $value->mask)}}" class="btn btn-danger" onclick="return confirm('Confirming welfare delete?')">Delete Record</a></td>
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
               <h5 class="modal-title" id="exampleModalCenterTitle">Enter Member's welfare</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
             <form class="" action='{{route('welfare.store')}}' method="post">
              @csrf
              <div class="form-group">
                <label>Enter Date</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-calendar"></i>
                    </div>
                  </div>
                  <input type="date" class="form-control" value="{{date('d/m/Y')}}" name="date" id="amount" autofocus required>
                </div>
              </div>
                 <div class="form-group">
                   <label>Enter amount</label>
                   <input type="text" name="id" id="" value="{{$name->id}}" hidden>
                   <div class="input-group">
                     <div class="input-group-prepend">
                       <div class="input-group-text">
                         <i class="fas fa-coins"></i>
                       </div>
                     </div>
                     <input type="text" class="form-control" placeholder="amount" name="amount" id="amount" autofocus required
                   </div>
                 </div>
                 <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="record">Record</button>
               </form>
             </div>
           </div>
         </div>
       </div>
       <!-- Vertically Center end -->


    <!-- single member welfare details -->
@endsection
