@extends('layouts.main')

@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl ">

            <!--begin::Table-->
            <div class="card card-flush mt-6 mt-xl-9">
            
                <!--begin::Card header-->
                <div class="card-header mt-2">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">System User</h3>
                    </div>
                    <!--begin::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table container-->
                    <div class="col-lg-12 col-sm-12 card card-body">
                        <h3>Edit User Details</h3>
                        <form action="{{ route('user.permissions.update', $userdetails->mask) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id=""
                                    value="{{ $userdetails->name }}">
                            </div>
                            <div class="fv-row mt-4">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                                <!--end::Label-->

                                <!--begin::Table wrapper-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                        <!--begin::Table body-->
                                        <tbody class="text-gray-600 fw-semibold">
                                            <!--begin::Table row-->
                                            <tr>
                                                <td class="text-gray-800">
                                                    Administrator Access
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Allows a full access to the system">
                                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                                class="path1"></span><span class="path2"></span><span
                                                                class="path3"></span></i></span>
                                                </td>
                                                <td>
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" type="checkbox" name=""
                                                            value="admin" id="select_all">
                                                        <span class="form-check-label" for="kt_roles_select_all">
                                                            Select all
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->
                                                </td>
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @foreach ($all_roles as $role)
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800 text-capitalize">{{ $role['name'] }}</td>
                                                    <!--end::Label-->

                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            @foreach ($role['permissions'] as $permission)
                                                                <!--begin::Checkbox-->
                                                                <label
                                                                    class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                    <input class="form-check-input permission"
                                                                        type="checkbox" value="{{ $permission->name }}"
                                                                        name="permissions[]"
                                                                        {{ in_array($permission->name, $perms) ? 'checked' : '0' }} />
                                                                    <span class="form-check-label text-capitalize">
                                                                        {{ $permission->name }}
                                                                    </span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                            @endforeach
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Input group-->
                                                </tr>
                                            @endforeach

                                            <!--end::Table row-->
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table wrapper-->
                            </div>

                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
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
    <script>
        $('document').ready(function() {
            $('#select_all').on('click', function(event) {
                $('.permission').prop('checked', event.target.checked);
            });
        })
    </script>
@endsection
