@extends('layouts.main')

@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container col-lg-4 col-md-6">
            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9">
                <div class="card-header mt-2">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Add User</h3>
                        {{-- <div class="fs-6 text-gray-500">Total $260,300 sepnt so far</div> --}}
                    </div>
                    <!--begin::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <form action="{{ route('user.save') }}" method="post">
                        @csrf
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bold text-gray-900 fs-6 mb-0">Name</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="text" name="name"
                                autocomplete="off" />
                            <!--end::Input-->
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bold text-gray-900 fs-6 mb-0">Email</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                                autocomplete="off" />
                            <!--end::Input-->
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bold text-gray-900 fs-6 mb-0">Phone</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="text" name="phone"
                                autocomplete="off" />
                            <!--end::Input-->
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <div class="form-group">
                            <label for="name">Position</label>
                            <div class="form-group m-0">
                                <input type="checkbox" name="position[]" value="admin" id="">
                                <label for="">Admin</label>
                            </div>
                            <div class="form-group m-0">
                                <input type="checkbox" name="position[]" value="gcg" id="">
                                <label for="">Game Changers Generation</label>
                            </div>
                            <div class="form-group m-0">
                                <input type="checkbox" name="position[]" value="welfare" id="">
                                <label for="">Welfare</label>
                            </div>
                            <div class="form-group m-0">
                                <input type="checkbox" name="position[]" value="woh" id="">
                                <label for="">Women Of Honour</label>
                            </div>
                            {{-- <input type="text" name="name" class="form-control" id="" value="{{$userdetails->name}}"> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
