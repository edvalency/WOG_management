@extends('layouts.main')
@section('gen')
    active
@endsection
@section('memlist')
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
       <!--begin::Content-->
 <div id="kt_app_content" class="app-content  flex-column-fluid ">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container  container-xxl ">

        <!--begin::Table-->
        <div class="card card-flush mt-6 mt-xl-9">
            <div class="d-flex justify-content-end align-items-end flex-wrap mb-2 mt-4"> <a
                    href="{{route('user.add')}}"
                    class="btn btn-sm btn-bg-primary text-white btn-active-color-primary me-3">Add
                    User</a>
            </div>
            <!--begin::Card header-->
            <div class="card-header mt-2">
                <!--begin::Card title-->
                <div class="card-title flex-column">
                    <h3 class="fw-bold mb-1">System Users</h3>
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar my-1">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-3"><span class="path1"></span><span
                                class="path2"></span></i> <input type="text" id="kt_filter_search"
                            class="form-control form-control-solid form-select-sm w-150px ps-9"
                            placeholder="Search Order" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table id="kt_profile_overview_table"
                        class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
                        <thead class="fs-7 text-gray-500 text-uppercase">
                            <tr>
                                <th>#</th>
                                {{-- <th>Mem. No.</th> --}}
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Roles</th>
                                <th>Actions</th>
                              </tr>
                        </thead>
                        <tbody class="fs-6">
                            @foreach ($users as $user)
                            <tr>
                              <td>{{ $loop->iteration}}</td>
                              {{-- <td>{{ $value->membership_no }}</td> --}}
                              <td id="name">{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->phone }}</td>
                              <td><ul>
                                @foreach ( json_decode($user->roles) as $position)
                                    <li>{{$position}}</li>
                                @endforeach
                                </ul></td>
                              <td ><a class="btn btn-warning mt-2" href="{{ route('user.edit',  $user->mask) }}">Edit</a> | <a class="btn btn-danger mt-2" href="{{ route('user.delete',  $user->mask) }}">Delete</a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
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


