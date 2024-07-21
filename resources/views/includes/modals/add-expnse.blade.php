 <!-- Vertically Center -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
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
