@extends('layouts.main')
@section('revenue')
    active
@endsection
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid ">


        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-fluid ">

           
            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9">
                <div class="d-flex justify-content-end align-items-end flex-wrap mb-2 mt-4"> <a data-bs-target="#add_revenue_modal" class="btn btn-sm btn-bg-primary text-white btn-active-color-primary me-3" data-bs-toggle="modal"
                    >Add Revenue</a>
</div>
                <!--begin::Card header-->
                <div class="card-header mt-2">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Revenue</h3>
                        {{-- <div class="fs-6 text-gray-500">Total $260,300 sepnt so far</div> --}}
                    </div>
                    <!--begin::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar my-1">
                        <!--begin::Select-->
                        <div class="me-6 my-1">
                            <select id="kt_filter_year" name="year" data-control="select2"
                                data-hide-search="true" class="w-125px form-select form-select-solid form-select-sm">
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
                            <select id="kt_filter_orders" name="orders" data-control="select2"
                                data-hide-search="true" class="w-125px form-select form-select-solid form-select-sm">
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
                            <thead class="fs-7 text-gray-500 text-uppercase">
                                <tr>
                                    <th class="min-w-250px">Manager</th>
                                    <th class="min-w-150px">Date</th>
                                    <th class="min-w-90px">Amount</th>
                                    <th class="min-w-90px">Status</th>
                                    <th class="min-w-50px text-end">Details</th>
                                </tr>
                            </thead>
                            <tbody class="fs-6">

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Emma
                                                    Smith</a>

                                                <div class="fw-semibold text-gray-500">smith@kpmg.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Oct 25, 2024</td>
                                    <td>$422.00</td>
                                    <td>
                                        <span class="badge badge-light-danger fw-bold px-4 py-3">
                                            Rejected </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        M </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Melody
                                                    Macy</a>

                                                <div class="fw-semibold text-gray-500">melody@altbox.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Jun 24, 2024</td>
                                    <td>$553.00</td>
                                    <td>
                                        <span class="badge badge-light-info fw-bold px-4 py-3">
                                            In progress </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-1.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Max
                                                    Smith</a>

                                                <div class="fw-semibold text-gray-500">max@kt.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Apr 15, 2024</td>
                                    <td>$608.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-5.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Sean
                                                    Bean</a>

                                                <div class="fw-semibold text-gray-500">sean@dellito.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Mar 10, 2024</td>
                                    <td>$964.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-25.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Brian
                                                    Cox</a>

                                                <div class="fw-semibold text-gray-500">brian@exchange.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Oct 25, 2024</td>
                                    <td>$984.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-warning text-warning fw-semibold">
                                                        C </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Mikaela
                                                    Collins</a>

                                                <div class="fw-semibold text-gray-500">mik@pex.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Nov 10, 2024</td>
                                    <td>$653.00</td>
                                    <td>
                                        <span class="badge badge-light-info fw-bold px-4 py-3">
                                            In progress </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-9.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Francis
                                                    Mitcham</a>

                                                <div class="fw-semibold text-gray-500">f.mit@kpmg.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Feb 21, 2024</td>
                                    <td>$995.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        O </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Olivia
                                                    Wild</a>

                                                <div class="fw-semibold text-gray-500">olivia@corpmail.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Nov 10, 2024</td>
                                    <td>$474.00</td>
                                    <td>
                                        <span class="badge badge-light-danger fw-bold px-4 py-3">
                                            Rejected </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-primary text-primary fw-semibold">
                                                        N </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Neil
                                                    Owen</a>

                                                <div class="fw-semibold text-gray-500">owen.neil@gmail.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Dec 20, 2024</td>
                                    <td>$922.00</td>
                                    <td>
                                        <span class="badge badge-light-success fw-bold px-4 py-3">
                                            Approved </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-23.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Dan
                                                    Wilson</a>

                                                <div class="fw-semibold text-gray-500">dam@consilting.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Jun 20, 2024</td>
                                    <td>$888.00</td>
                                    <td>
                                        <span class="badge badge-light-success fw-bold px-4 py-3">
                                            Approved </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        E </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Emma
                                                    Bold</a>

                                                <div class="fw-semibold text-gray-500">emma@intenso.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Jun 24, 2024</td>
                                    <td>$623.00</td>
                                    <td>
                                        <span class="badge badge-light-danger fw-bold px-4 py-3">
                                            Rejected </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-12.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Ana
                                                    Crown</a>

                                                <div class="fw-semibold text-gray-500">ana.cf@limtel.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Oct 25, 2024</td>
                                    <td>$547.00</td>
                                    <td>
                                        <span class="badge badge-light-danger fw-bold px-4 py-3">
                                            Rejected </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-info text-info fw-semibold">
                                                        A </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Robert
                                                    Doe</a>

                                                <div class="fw-semibold text-gray-500">robert@benko.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>May 05, 2024</td>
                                    <td>$523.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-13.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">John
                                                    Miller</a>

                                                <div class="fw-semibold text-gray-500">miller@mapple.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Feb 21, 2024</td>
                                    <td>$514.00</td>
                                    <td>
                                        <span class="badge badge-light-success fw-bold px-4 py-3">
                                            Approved </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-success text-success fw-semibold">
                                                        L </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Lucy
                                                    Kunic</a>

                                                <div class="fw-semibold text-gray-500">lucy.m@fentech.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Dec 20, 2024</td>
                                    <td>$788.00</td>
                                    <td>
                                        <span class="badge badge-light-danger fw-bold px-4 py-3">
                                            Rejected </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-21.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Ethan
                                                    Wilder</a>

                                                <div class="fw-semibold text-gray-500">ethan@loop.com.au</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Jun 24, 2024</td>
                                    <td>$959.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-primary text-primary fw-semibold">
                                                        N </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Neil
                                                    Owen</a>

                                                <div class="fw-semibold text-gray-500">owen.neil@gmail.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Aug 19, 2024</td>
                                    <td>$925.00</td>
                                    <td>
                                        <span class="badge badge-light-info fw-bold px-4 py-3">
                                            In progress </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-9.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Francis
                                                    Mitcham</a>

                                                <div class="fw-semibold text-gray-500">f.mit@kpmg.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Mar 10, 2024</td>
                                    <td>$889.00</td>
                                    <td>
                                        <span class="badge badge-light-success fw-bold px-4 py-3">
                                            Approved </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Emma
                                                    Smith</a>

                                                <div class="fw-semibold text-gray-500">smith@kpmg.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Sep 22, 2024</td>
                                    <td>$474.00</td>
                                    <td>
                                        <span class="badge badge-light-danger fw-bold px-4 py-3">
                                            Rejected </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-13.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">John
                                                    Miller</a>

                                                <div class="fw-semibold text-gray-500">miller@mapple.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Jun 24, 2024</td>
                                    <td>$977.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-5.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Sean
                                                    Bean</a>

                                                <div class="fw-semibold text-gray-500">sean@dellito.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Feb 21, 2024</td>
                                    <td>$533.00</td>
                                    <td>
                                        <span class="badge badge-light-danger fw-bold px-4 py-3">
                                            Rejected </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-info text-info fw-semibold">
                                                        A </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Robert
                                                    Doe</a>

                                                <div class="fw-semibold text-gray-500">robert@benko.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Dec 20, 2024</td>
                                    <td>$710.00</td>
                                    <td>
                                        <span class="badge badge-light-danger fw-bold px-4 py-3">
                                            Rejected </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Emma
                                                    Smith</a>

                                                <div class="fw-semibold text-gray-500">smith@kpmg.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Mar 10, 2024</td>
                                    <td>$773.00</td>
                                    <td>
                                        <span class="badge badge-light-danger fw-bold px-4 py-3">
                                            Rejected </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-1.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Max
                                                    Smith</a>

                                                <div class="fw-semibold text-gray-500">max@kt.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Jun 24, 2024</td>
                                    <td>$850.00</td>
                                    <td>
                                        <span class="badge badge-light-success fw-bold px-4 py-3">
                                            Approved </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-13.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">John
                                                    Miller</a>

                                                <div class="fw-semibold text-gray-500">miller@mapple.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Apr 15, 2024</td>
                                    <td>$779.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-25.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Brian
                                                    Cox</a>

                                                <div class="fw-semibold text-gray-500">brian@exchange.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Feb 21, 2024</td>
                                    <td>$436.00</td>
                                    <td>
                                        <span class="badge badge-light-info fw-bold px-4 py-3">
                                            In progress </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        O </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Olivia
                                                    Wild</a>

                                                <div class="fw-semibold text-gray-500">olivia@corpmail.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Feb 21, 2024</td>
                                    <td>$921.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-25.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Brian
                                                    Cox</a>

                                                <div class="fw-semibold text-gray-500">brian@exchange.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Nov 10, 2024</td>
                                    <td>$859.00</td>
                                    <td>
                                        <span class="badge badge-light-info fw-bold px-4 py-3">
                                            In progress </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        E </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Emma
                                                    Bold</a>

                                                <div class="fw-semibold text-gray-500">emma@intenso.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>Nov 10, 2024</td>
                                    <td>$965.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-5.jpg" />
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary">Sean
                                                    Bean</a>

                                                <div class="fw-semibold text-gray-500">sean@dellito.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td>May 05, 2024</td>
                                    <td>$935.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>
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
