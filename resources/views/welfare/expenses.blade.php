@extends('layouts.main')
@section('welfare')
    active
@endsection
@section('welexpense')
    active
@endsection
@section('search')
    <li>
        <form class="form-inline mr-auto" method="POST" action="{{ route('welfaresupport.search') }}">
            @csrf
            <div class="search-element">
                <input class="form-control" type="search" id="search" placeholder="search supported member"
                    aria-label="Search" name="search" data-width="200">
                <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </li>
@endsection
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-fluid ">
            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9">
                <div class="d-flex justify-content-end align-items-end flex-wrap mb-2 mt-4"> <a
                        data-bs-target="#add_revenue_modal"
                        class="btn btn-sm btn-bg-primary text-white btn-active-color-primary me-3"
                        data-bs-toggle="modal">Add Member</a>
                </div>
                <!--begin::Card header-->
                <div class="card-header mt-2">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Welfare Members Support records</h3>
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
                                    <th>Date</th>
                                    <th class="min-w-250px">Name</th>
                                    <th class="min-w-150px">Purpose</th>
                                    <th class="min-w-150px">Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody class="fs-6">
                                @foreach ($member as $key => $value)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{date("D, d F Y", strtotime($value->created_at))}}</td>
                                    <td>{{ $value->fullname }}</td>
                                    <td>{{ $value->reason }}</td>
                                    <td>{{ $value->amount }}</td>
                                    <td><a href="http://" class="btn btn-primary"><i class="fas fa-pen"></i></a> | <a href="http://" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
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
    @include('includes.modals.add-revenue')
@endsection
