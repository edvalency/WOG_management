@extends('layouts.main')
@section('revenue')
    active
@endsection
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl mt-3">
            <div class="card card-body">

                <!--begin::Stats-->
                <div class="d-flex flex-wrap flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <!--begin::Stats-->
                        {{-- <div class="d-flex flex-wrap">
                                <!--begin::Stat-->
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span
                                                class="path1"></span><span class="path2"></span></i>
                                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="4500"
                                            data-kt-countup-prefix="$">0</div>
                                    </div>
                                    <!--end::Number-->

                                    <!--begin::Label-->
                                    <div class="fw-semibold fs-6 text-gray-500">Earnings</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->

                                <!--begin::Stat-->
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2"><span
                                                class="path1"></span><span class="path2"></span></i>
                                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="75">0
                                        </div>
                                    </div>
                                    <!--end::Number-->

                                    <!--begin::Label-->
                                    <div class="fw-semibold fs-6 text-gray-500">Projects</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->

                                <!--begin::Stat-->
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span
                                                class="path1"></span><span class="path2"></span></i>
                                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="60"
                                            data-kt-countup-prefix="%">0</div>
                                    </div>
                                    <!--end::Number-->

                                    <!--begin::Label-->
                                    <div class="fw-semibold fs-6 text-gray-500">Success Rate</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->
                            </div> --}}
                        <!--end::Stats-->
                        {{-- <div class="d-flex justify-content-end align-items-end flex-wrap mb-2 mt-4">
                                <div class="d-flex justify-content-end align-items-end flex-wrap mb-2"> <a
                                        data-bs-target="#add_member_modal"
                                        class="btn btn-sm btn-bg-primary text-white btn-active-color-primary me-3"
                                        data-bs-toggle="modal">Add Member</a>
                                </div>
                                <div class="d-flex justify-content-end align-items-end flex-wrap mb-2"> <a
                                        data-bs-target="#add_visitor_modal"
                                        class="btn btn-sm btn-bg-primary text-white btn-active-color-primary me-3"
                                        data-bs-toggle="modal">Add Visitor</a>
                                </div>
                                <a href="{{ route('attendance.record') }}"
                                    class="btn btn-sm btn-bg-primary text-white btn-active-color-primary me-3 mb-2">Record
                                    attendance</a>
                            </div> --}}

                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Stats-->
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#members">General</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 " wire:click="activate('routes')" data-bs-toggle="tab"
                            href="#visitors">Tithe</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->

                    <!--end:::Tab item-->
                </ul>
                <!--end:::Tabs-->
            </div>
            <div class="tab-content">
                <div class="tab-pane show active">
                    <!--begin::Table-->
                    <div class="card card-flush mt-6 mt-xl-9">
                        <div class="d-flex justify-content-end align-items-end flex-wrap mb-2 mt-4"> <a
                                data-bs-target="#add_revenue_modal"
                                class="btn btn-sm btn-bg-primary text-white btn-active-color-primary me-3"
                                data-bs-toggle="modal">Add
                                Revenue</a>
                        </div>
                        <!--begin::Card header-->
                        <div class="card-header mt-2">
                            <!--begin::Card title-->
                            <div class="card-title flex-column">
                                <h3 class="fw-bold mb-1">Revenue</h3>
                                <div class="fs-5 text-gray-800">Total GHc {{ number_format($monthSum, 2) }} recorded this
                                    month</div>
                            </div>
                            <!--begin::Card title-->

                            <!--begin::Card toolbar-->
                            <div class="card-toolbar my-1">
                                <!--begin::Select-->
                                <div class="me-4 my-1">
                                    <select id="kt_filter_orders" name="orders" data-control="select2"
                                        data-hide-search="true"
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
                                        id="kt_filter_search"
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
                                    <thead class="fs-7 text-dark text-uppercase">
                                        <tr>
                                            <th class="min-w-250px">Recorded by</th>
                                            <th class="min-w-150px">Date</th>
                                            <th class="min-w-150px">Revenue type</th>
                                            <th class="min-w-90px">Amount</th>
                                            <th class="min-w-50px text-end">Details</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fs-6">
                                        @foreach ($revenues as $revenue)
                                            <tr>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="#"
                                                                class="fs-6 text-gray-800 text-hover-primary">{{ $revenue->name }}</a>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td>{{ date('D, m M Y', strtotime($revenue->created_at)) }}</td>
                                                <td>{{ $revenue->type }}</td>
                                                <td>{{ $revenue->amount }}</td>
                                                <td class="text-end">
                                                    <a href="#"
                                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">Actions
                                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('revenue.edit', $revenue->id) }}"
                                                                class="menu-link px-3">Edit</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('revenue.delete', $revenue->id) }}"
                                                                onclick="return confirm('Confirm you want to delete?')"
                                                                class="menu-link px-3">Delete</a>
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
                <div class="tab-pane"></div>
            </div>

        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    @include('includes.modals.add-revenue')
@endsection
