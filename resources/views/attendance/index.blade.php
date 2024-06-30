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
        <div id="kt_app_content_container" class="app-container container-sm ">


            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9">
                <div class="d-flex justify-content-end align-items-end flex-wrap mb-2 mt-4"> <a
                        href="{{ route('attendance.record') }}"
                        class="btn btn-sm btn-bg-primary text-white btn-active-color-primary me-3">Record attendance</a>
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
                                    <th class="min-w-150px">Date</th>
                                    <th class="min-w-150px">Attendance</th>
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
