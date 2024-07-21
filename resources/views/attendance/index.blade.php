@extends('layouts.main')
@section('attendance')
    active
@endsection
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-sm ">
            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9">
                <div class="d-flex justify-content-end">
                    <div class="d-flex justify-content-end align-items-end flex-wrap mb-2 mt-4"> <a
                        data-bs-target="#add_member_modal"
                        class="btn btn-sm btn-bg-primary text-white btn-active-color-primary me-3"
                        data-bs-toggle="modal">Add Member</a>
                </div>
                    <div class="d-flex justify-content-end align-items-end flex-wrap mb-2 mt-4"> <a
                            href="{{ route('attendance.record') }}"
                            class="btn btn-sm btn-bg-primary text-white btn-active-color-primary me-3">Record attendance</a>
                    </div>
                </div>
                <!--begin::Card header-->
                <div class="card-header mt-2">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Weekly Attendance</h3>
                    </div>
                    <!--begin::Card title-->
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
                                    <th class="min-w-50px">Date</th>
                                    <th class="min-w-50px">Attendance</th>
                                </tr>
                            </thead>
                            <tbody class="fs-6">
                                @foreach ($logs as $date => $attendance)
                                    <tr>
                                        <td>
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary">{{ date('d M Y',strtotime($date)) }}</a>
                                        </td>
                                        <td>
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary">{{ $attendance }}</a>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('attendance.members', $date) }}" class="menu-link px-3">View members</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                {{-- <div class="menu-item px-3">
                                                    <a href="{{route('member.delete',$member->mask)}}" onclick="return confirm('Confirm you want to delete?')" class="menu-link px-3"
                                                        >Delete</a>
                                                </div> --}}
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>

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
    @include('includes.modals.add-member')
@endsection
