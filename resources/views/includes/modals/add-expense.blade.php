<!--begin::Modal - Invite Friends-->
<div class="modal fade" id="add_revenue_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-450px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y pt-0 pb-15">
                <!--begin::Body-->
                <div class="card card-body">
                    <div class="">
                        <!--begin::Content-->
                        <div class="d-flex flex-center flex-column flex-column-fluid">
                            <!--begin::Wrapper-->
                            <div class="">

                                <!--begin::Form-->
                                <form class="form" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{route("expense.store")}}">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="text-center mb-10">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-900 mb-3">
                                            Add Expense</h1>
                                        <!--end::Title-->
                                    </div>
                                    <!--begin::Heading-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fs-6 fw-bold text-gray-900 required">Expense type</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <select name="type" id="" class="form-control">
                                            <option value="">--select--</option>
                                            <option value="Water Bill">Water Bill</option>
                                            <option value="Prepaid Bill">Prepaid Bill</option>
                                            <option value="Allowance">Allowance</option>
                                            <option value="Missions Offering top up">Missions Offering top up</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack mb-2">
                                            <!--begin::Label-->
                                            <label class="form-label fw-bold text-gray-900 fs-6 mb-0">Description</label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Input-->
                                        <textarea name="description" class="form-control" id="" cols="30" rows=""></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack mb-2">
                                            <!--begin::Label-->
                                            <label class="form-label fw-bold text-gray-900 fs-6 mb-0 required">Amount</label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Input-->
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                            name="amount" autocomplete="off" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <!--begin::Submit button-->
                                        <button type="submit" id="kt_sign_in_submit"
                                            class="btn btn-lg btn-primary w-100 mb-5">
                                            <span class="indicator-label">
                                                Save
                                            </span>

                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                        <!--end::Submit button-->
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal
