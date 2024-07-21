@extends('layouts.main');

@section('gcdown')
    active
@endsection
@section('gccontrib')
    active
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="card card-primary container col-xs-6">
                <div class="card-header">
                    <h3>Contribution Projects</h3>
                </div>
                <div class="row ml-4">
                    <button class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModalCenter">Start new project</button>

                </div>
                <div class="card-body">
                    
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tbody id='offertorylist'>
                                    <tr>
                                        <th>Projects</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($data as $key=>$value)
                                        <tr>
                                          <td width="400">{{$value->description}}</td>
                                          <td><a class="btn btn-outline-dark" href="{{route('gcproject.show',['proj'=>Crypt::encrypt($value->description)])}}">View payments</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
         <!-- Vertically Center -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalCenterTitle">Enter member's contribution</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
             <form class="" action='{{route('gccontrib.store')}}' method="post">
                 <div class="form-group">
                   @csrf
                   <div class="input-group mb-2">
                       <input type="text" name="fullname" class="form-control" placeholder="Enter fullname" id="">
                   </div>
                   <div class="input-group mb-2">
                       <input type="text" name="purpose" class="form-control" placeholder="Enter project or purpose" id="">
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

        <!-- Vertically Center -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Enter new project</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="" action='{{route('gccontrib.store')}}' method="post">
                <div class="form-group">
                  @csrf
                  <div class="input-group mb-2">
                      <input type="text" name="purpose" class="form-control" placeholder="Enter project or purpose" id="">
                  </div>
                  
                </div>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="record">Create</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Vertically Center end -->
</div>
    
@endsection