@extends('layouts.main')
@section('welfare')
    active
@endsection
@section('welexpense')
    active
@endsection
@section('content')

    <!--begin::Content-->
 <div id="kt_app_content" class="app-content  flex-column-fluid ">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container  container-fluid ">
        <!--begin::Table-->
        <div class="card card-flush mt-6 mt-xl-9">

            <div class="d-flex justify-content-end align-items-end flex-wrap mb-2 mt-4"> <a
                    data-bs-target="#add_welfare_support_modal"
                    class="btn btn-sm btn-bg-primary text-white btn-active-color-primary me-3"
                    data-bs-toggle="modal">Add Support</a>
            </div>
            <!--begin::Card header-->
            <div class="card-header mt-2">
                <!--begin::Card title-->
                <div class="card-title flex-column">
                    <h3 class="fw-bold mb-1">{{$member->fullname}} support records</h3>
                    {{-- <div class="fs-6 text-gray-500">Total $260,300 sepnt so far</div> --}}
                </div>
                <!--begin::Card title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar my-1">
                    <!--begin::Select-->
                    <div class="me-6 my-1">
                        <select id="kt_filter_year" name="year" data-control="select2" data-hide-search="true"
                            class="w-125px form-select form-select-solid form-select-sm">
                            <option value="All" selected>All time</option>
                            <option value="thisyear">This year</option>
                            <option value="thismonth">This month</option>
                            <option value="lastmonth">Last month</option>
                            <option value="last90days">Last 90 days</option>
                        </select>
                    </div>
                    <!--end::Select-->

                    <!--begin::Select-->
                    <div class="me-4 my-1">
                        <select id="kt_filter_orders" name="orders" data-control="select2" data-hide-search="true"
                            class="w-125px form-select form-select-solid form-select-sm">
                            <option value="All" selected>All Orders</option>
                            <option value="Approved">Approved</option>
                            <option value="Declined">Declined</option>
                            <option value="In Progress">In Progress</option>
                            <option value="In Transit">In Transit</option>
                        </select>
                    </div>
                    <!--end::Select-->

                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-3"><span
                                class="path1"></span><span class="path2"></span></i> <input type="text"
                            id="kt_filter_search" class="form-control form-control-solid form-select-sm w-150px ps-9"
                            placeholder="Search List" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <h4 class="align-self-center mt-3 mb-4" id='membername'></h4>
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table id="kt_profile_overview_table"
                        class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
                        <thead class="fs-7 text-gray-500 text-uppercase">
                            <tr>
                                <th class="min-w-250px">Date</th>
                                <th class="min-w-250px">Purpose</th>
                                <th class="min-w-150px">Amount (GHC)</th>
                                <th class="min-w-150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fs-6">
                            <tbody>
                                @foreach ($records as $log)
                                <tr>
                                    <td>{{ date('d F Y', strtotime($log->created_at)) }}</td>
                                    <td>{{ $log->reason }}</td>
                                    <td>{{ $log->amount }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('welfare.support.delete', $log->id) }}" onclick="return confirm('Confirm you want to delete?')" class="menu-link px-3">Delete</a>
                                            </div>
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
@include('includes.modals.add-welfare-support',['member'=>$member])

@endsection
