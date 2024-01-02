@extends('layouts.main')
@section('tithe')
    active
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <!-- single member tithe details -->

                <div class="card col-4 container" id="member_welfare">
                    <h4 class="align-self-center mt-3 mb-4" id='membername'></h4>
                    <div>
                        <a href="{{route('tithe.show')}}" class="btn btn-primary ml-4 mb-4"><i
                                class="fas fa-less-than"></i></a>
                        <!-- <button class="btn btn-success ml-2 mb-4">Record Payment</button> -->
                        <button type="button" class="btn btn-success ml-2 mb-4 " data-toggle="modal"
                            data-target="#exampleModalCenter">Record tithe</button>
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
                                    <td>{{date('D, d M Y',strtotime($value->created_at))}}</td>
                                    <td>{{$value->amount}}</td>
                                    <td><a href="{{route('tithe.delete', $value->id)}}" class="btn btn-danger" onclick="return confirm('Confirming record delete?')" >Delete record</a></td>
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
               <h5 class="modal-title" id="exampleModalCenterTitle">Enter Member's tithe</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
             <form class="" action='{{route('tithes.store')}}' method="post">
                 <div class="form-group">
                   
                   <input type="text" name="id" id="" value="{{$name->id}}"hidden >
                   @csrf
                   <div class="form-group">
                    <label>Enter Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                        </div>
                      </div>
                      <input type="date" class="form-control" value="{{date('d/m/Y')}}" name="date" autofocus>
                    </div>
                  </div>
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
                 <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="record">Record</button>
               </form>
             </div>
           </div>
         </div>
       </div>
       <!-- Vertically Center end -->
    </div>

    <!-- single member tithe details -->
@endsection
