@extends('layouts.main')
@section('attendance')
    active
@endsection

@section('content')

  <section class="section">
    <div class="section-body">
      <!-- add content here -->
      <!-- list table -->
      <div class="col-12 col-xs-12" id="memlist">
        <div class="card card-primary">
          <div class="card-header">
            <h4>Attendance Log</h4>
          </div>
          <div class="card-body p-5">
            <div class="table-responsive">
              <table class="table table-bordered table-md">
                <tr>
                  <th>#</th>
                  <th>Mem. No.</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Residence</th>
                  <th>Detail</th>
                </tr>
                <tbody>
                  @foreach ($data as $key=>$value)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->membership_no }}</td>
                    <td id="name">{{ $value->fullname }}</td>
                    <td>{{ $value->contact }}</td>
                    <td>{{ $value->residence }}</td>
                    <td ><a class="btn btn-success mt-2" href="{{ route('mem.single',  $value->mask) }}">Details</a></td>
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

    </div>
  </section>
  <div class="settingSidebar">
    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
    </a>
    <div class="settingSidebar-body ps-container ps-theme-default">
      <div class=" fade show active">
        <div class="setting-panel-header">Setting Panel
        </div>
        <div class="p-15 border-bottom">
          <h6 class="font-medium m-b-10">Select Layout</h6>
          <div class="selectgroup layout-color w-50">
            <label class="selectgroup-item">
              <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
              <span class="selectgroup-button">Light</span>
            </label>
            <label class="selectgroup-item">
              <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
              <span class="selectgroup-button">Dark</span>
            </label>
          </div>
        </div>
        <div class="p-15 border-bottom">
          <h6 class="font-medium m-b-10">Sidebar Color</h6>
          <div class="selectgroup selectgroup-pills sidebar-color">
            <label class="selectgroup-item">
              <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
              <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
            </label>
            <label class="selectgroup-item">
              <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
              <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
            </label>
          </div>
        </div>
        <div class="p-15 border-bottom">
          <h6 class="font-medium m-b-10">Color Theme</h6>
          <div class="theme-setting-options">
            <ul class="choose-theme list-unstyled mb-0">
              <li title="white" class="active">
                <div class="white"></div>
              </li>
              <li title="cyan">
                <div class="cyan"></div>
              </li>
              <li title="black">
                <div class="black"></div>
              </li>
              <li title="purple">
                <div class="purple"></div>
              </li>
              <li title="orange">
                <div class="orange"></div>
              </li>
              <li title="green">
                <div class="green"></div>
              </li>
              <li title="red">
                <div class="red"></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="p-15 border-bottom">
          <div class="theme-setting-options">
            <label class="m-b-0">
              <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                id="mini_sidebar_setting">
              <span class="custom-switch-indicator"></span>
              <span class="control-label p-l-10">Mini Sidebar</span>
            </label>
          </div>
        </div>
        <div class="p-15 border-bottom">
          <div class="theme-setting-options">
            <label class="m-b-0">
              <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                id="sticky_header_setting">
              <span class="custom-switch-indicator"></span>
              <span class="control-label p-l-10">Sticky Header</span>
            </label>
          </div>
        </div>
        <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
          <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
            <i class="fas fa-undo"></i> Restore Default
          </a>
        </div>
      </div>
    </div>
  </div>
    
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
