@extends('layouts.main')
{{-- @section('gen')
    active
@endsection --}}
@section('users')
    active
@endsection
@section('search')
<li>
  {{-- <form class="form-inline mr-auto"> --}}
    <div class="search-element">
      <form action="{{route('search_member')}}" method="post">
        @csrf
        <input class="form-control" type="search" name="search" id="search" placeholder="Search" aria-label="Search" data-width="200">
      <button class="btn" type="submit">
        <i class="fas fa-search"></i>
      </button>
      </form>
      
    </div>
  {{-- </form> --}}
</li>
@endsection

@section('content')

      <!-- add content here -->
      <!-- list table -->
      <div class="col-12 col-xs-12" id="memlist">
        <div class="card card-primary">
          <div class="card-header">
            <h4>All Users</h4>
          </div>
          <div class="card-body p-5">
            <a href="{{route('user.add')}}" class="btn btn-primary">Add User</a>
            <div class="table-responsive">
              <table class="table table-bordered table-md">
                <tr>
                  <th>#</th>
                  {{-- <th>Mem. No.</th> --}}
                  <th>Name</th>
                  <th>Username</th>
                  <th>Roles</th>
                  <th>Actions</th>
                </tr>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td>{{ $loop->iteration}}</td>
                    {{-- <td>{{ $value->membership_no }}</td> --}}
                    <td id="name">{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td><ul>
                      @foreach ( json_decode($user->position) as $position)
                          <li>{{$position}}</li>
                      @endforeach
                      </ul></td>
                    <td ><a class="btn btn-warning mt-2" href="{{ route('user.edit',  $user->mask) }}">Edit</a> | <a class="btn btn-danger mt-2" href="{{ route('user.delete',  $user->mask) }}">Delete</a> </td>
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
                  <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
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
      <!-- list table -->
      {{-- <!-- single mmeber details -->
      <!-- <div class="col-6 col-xs-6 container" > -->
        <div class="card card-primary container col-6" id='onemem'>
        <button class="btn col-2 btn-success mt-2" id='back' onclick='list()'>Return</button>
          <p class='font-30 align-self-center font-weight-bold mt-5' id='memberName'></p>
          <div class="card-body">
            <div class="table-responsive">
              <p id="text"></p>
              <table class="table table-bordered" >
                <tbody id="memtable">
                </tbody>
              </table>
            </div>
          </div>
        </div>

      <!-- </div> -->
      <!-- single member details end --> --}}

  
    
{{-- <script type="text/javascript">
  $('#search').on('keyup', function(){
    var search = $('#search').val();

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $.ajax({
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        url: "{{route('member_lookup')}}",
        data:{name: search},
        success: function(data, status){
            console.log(data);
        }
    })

    console.log(search);
});
</script> --}}
@endsection

<script src="/js/members.blade.js"></script>

<script src="/js/app.min.js"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="/js/custom.js"></script>
