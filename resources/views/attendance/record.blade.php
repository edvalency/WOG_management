@extends('layouts.main')
@section('members')
    active
@endsection
@section('search')
    <li>
        {{-- <form class="form-inline mr-auto"> --}}
        <div class="search-element">
            <form action="{{ route('search_member') }}" method="post">
                @csrf
                <input class="form-control" type="search" name="search" id="search" placeholder="Search" aria-label="Search"
                    data-width="200">
                <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>

        </div>
        {{-- </form> --}}
    </li>
@endsection

@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl">
            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9">
                <!--begin::Card header-->
                <div class="card-header mt-2">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Attendance</h3>
                        {{-- <div class="fs-6 text-gray-500">Total $260,300 sepnt so far</div> --}}
                    </div>
                    <!--begin::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar my-1">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-3"><span
                                    class="path1"></span><span class="path2"></span></i> <input type="text"
                                id="kt_filter_search" class="form-control form-control-solid form-select-sm w-150px ps-9"
                                placeholder="Search Order" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form action="{{route('attendance.save')}}" method="post">
                        @csrf
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="attendance_table"
                                class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
                                <thead class="fs-7 text-gray-500 text-uppercase">
                                    <tr>
                                        <th class="min-w-150px">Mark as present</th>
                                        <th class="min-w-150px">Mem ID</th>
                                        <th class="min-w-150px">Image</th>
                                        <th class="min-w-150px">Name</th>
                                    </tr>
                                </thead>
                                <tbody class="fs-6">
                                    @foreach ($members as $member)
                                        <tr>
                                            <td><input type="checkbox" name="present[]" id="" class="form-checkbox" value="{{$member->membership_no}}"></td>
                                            <td>
                                                <a href="#"
                                                    class="fs-6 text-gray-800 text-hover-primary">{{ $member->membership_no }}</a>
                                            </td>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-75px symbol-circle">
                                                            <img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>{{ $member->fullname }}</td>
                                            {{-- <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('mem.single', $member->mem) }}" class="menu-link px-3">View</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{route('member.delete',$member->mask)}}" onclick="return confirm('Confirm you want to delete?')" class="menu-link px-3"
                                                            >Delete</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                        <button type="submit" class="btn btn-sm btn-bg-primary text-white btn-active-color-primary me-3" onclick="return confirm('Confirming you want to mark selected members as present')">Mark as present</button>
                    </form>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    @include('includes.modals.add-member')
    <script>
        document.on('load',function(){
console.log('loaded');
        });
    </script>
@endsection
