<div>

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Organization</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/organization/overview" class="text-muted text-hover-primary">Organization</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Add</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Secondary button-->
                    <a href="/apps/customers/list"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Load Board</a>
                    <!--end::Secondary button-->
                    <!--begin::Primary button-->
                    <a href="/organization/add" class="btn btn-sm fw-bold btn-primary">Fleet Mangement</a>
                    <!--end::Primary button-->
                    <!--begin::Secondary button-->
                    <a href="/organization/list"
                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Browse
                        Organizations</a>
                    <!--end::Secondary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Form-->
            <div id="kt_ecommerce_add_organization_form" class="form d-flex flex-column flex-lg-row"
                data-kt-redirect="/apps/ecommerce/catalog/organizations">
                <!--begin::Aside column-->
                <form wire:submit.prevent="general" method="post">
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <!--begin::Thumbnail settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Logo</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                <!--begin::Image input placeholder-->
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image.svg');
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                    }
                                </style>
                                <!--end::Image input placeholder-->
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->

                                    @if ($image)
                                    <div class="">
                                        <img class="w-150px h-150px" src="{{ $image->temporaryUrl() }}">
                                    </div>
                                    @else
                                    <img class="w-150px h-150px" src="{{asset('storage/logos/'.$this->org['image'])}}" alt="image" />
                                    @endif
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change avatar">
                                        <i class="ki-duotone ki-pencil fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <!--begin::Inputs-->
                                        <input type="file" wire:model="image" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="Cancel avatar">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="Remove avatar">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the organization logo image. Only *.png, *.jpg and
                                    *.jpeg image
                                    files are accepted</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Thumbnail settings-->
                        <!--begin::Status-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Location</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-success w-15px h-15px"
                                        id="kt_ecommerce_add_organization_status">
                                    </div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <label class="required form-label">Country</label>

                                <select class="form-select mb-2" wire:model="org.country" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select an option"
                                    id="kt_ecommerce_add_organization_status_select">
                                    <option></option>
                                    <option value="Ghana" selected="selected">Ghana</option>

                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the country of operation</div>
                                <!--end::Description-->
                                <!--begin::Datepicker-->
                                <div class="d-none mt-10">
                                    <label for="kt_ecommerce_add_organization_status_datepicker"
                                        class="form-label">Select
                                        publishing
                                        date and time</label>
                                    <input class="form-control" id="kt_ecommerce_add_organization_status_datepicker"
                                        placeholder="Pick date & time" />
                                </div>
                                <!--end::Datepicker-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <label class="required form-label">Region</label>

                                <select class="form-select mb-2" wire:model="org.region" data-control="select2"
                                    data-hide-search="true" data-placeholder="Select an option"
                                    id="kt_ecommerce_add_organization_status_select">
                                    <option></option>
                                    <option value="Greater Accra" selected="selected">Greater Accra</option>
                                    <option value="Ashanti Region">Ashanti Region</option>

                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the region in Ghana of operation</div>
                                <!--end::Description-->
                                <!--begin::Datepicker-->
                                <div class="d-none mt-10">
                                    <label for="kt_ecommerce_add_organization_status_datepicker"
                                        class="form-label">Select
                                        publishing
                                        date and time</label>
                                    <input class="form-control" id="kt_ecommerce_add_organization_status_datepicker"
                                        placeholder="Pick date & time" />
                                </div>
                                <!--end::Datepicker-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Status-->

                        <!--begin::Template settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Load Preferences</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select store template-->
                                <label for="kt_ecommerce_add_organization_store_template" class="form-label">Select as
                                    many as
                                    apply</label>
                                <!--end::Select store template-->

                                @foreach ($this->loads() as $load)
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-8 mt-5">
                                     <!--begin::Bullet-->
                                     @if (in_array($load->name,$this->org_load_list))
                                     <span class="bullet bullet-vertical h-20px bg-primary"></span>
                                     @else
                                     <span class="bullet bullet-vertical h-20px bg-white"></span>
                                     @endif
                                    <!--end::Bullet-->
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid mx-5">
                                        <input class="form-check-input" wire:model="org_load_type" wire:key="{{$load->id}}"  type="checkbox"
                                            value="{{$load->name}}" />
                                    </div>
                                    <!--end::Checkbox-->
                                    <div class="flex-grow-1">
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fw-bold fs-6">{{$load->name}}</a>
                                    </div>
                                </div>
                                <!--end:Item-->
                                @endforeach
                                <!--begin::Form group-->
                                {{-- <div class="form-group mt-5">
                                    <button type="button" data-repeater-create=""
                                        class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_org_pref">
                                        <i class="ki-duotone ki-plus fs-2"></i>Add new preference</button>
                                </div> --}}
                                <!--end::Form group-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7 mt-5">These specify which goods your company can transport
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->

                        </div>
                        <!--end::Template settings-->
                    </div>
                </form>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ $general ? 'active' : '' }}"
                                wire:click="activate('general')" data-bs-toggle="tab"
                                href="#kt_ecommerce_add_organization_general">General</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ $routes ? 'active' : '' }}"
                                wire:click="activate('routes')" data-bs-toggle="tab"
                                href="#kt_ecommerce_add_organization_advanced">Routes & Fleet</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        {{-- <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ $subscription ? 'active' : '' }}"
                                wire:click="activate('subscription')" data-bs-toggle="tab"
                                href="#kt_ecommerce_biling_and_shipping_info">Subscription Account</a>
                        </li> --}}
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        {{-- <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ $payin ? 'active' : '' }}"
                                wire:click="activate('payin')" data-bs-toggle="tab"
                                href="#kt_ecommerce_payIn_account">Pay-In Account</a>
                        </li> --}}
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <form wire:submit.prevent="general" method="post" class="{{ $general ? '' : 'd-none' }}">

                            <div class="tab-pane fade {{ $general ? 'show active' : '' }}"
                                id="kt_ecommerce_add_organization_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>General</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Organization Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->

                                                <input type="text" wire:model="org.name" class="form-control mb-2"
                                                    placeholder="Organization name" value=""  />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A organization name is required and
                                                    recommended to
                                                    be
                                                    unique.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div>
                                                <!--begin::Label-->
                                                <label class="form-label">Description</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <textarea class="form-control" cols="50" wire:model="org.description" class="min-h-200px mb-2">
                                                </textarea>
                                                <!--end::Editor-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Set a description to the organization for
                                                    better
                                                    visibility.</div>
                                                <!--end::Description-->
                                            </div>
                                            <div class="mt-4">
                                                <!--begin::Label-->
                                                <label class="form-label">Tax Number</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <input class="form-control" type="text" wire:model="org.tax_id" class="min-h-200px mb-2">
                                                <!--end::Editor-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Enter tax identification for organization</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                    <!--begin::Tab pane-->

                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Contact Information</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" wire:model="org.email"
                                                    class="form-control mb-2" placeholder="Organization Email"
                                                    />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Enter the business Email.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Phone number</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="tel" wire:model="org.phone"
                                                    class="form-control mb-2" placeholder="Organization Phone number"
                                                    />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Enter the business phone number.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Physical Address</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" wire:model="org.address"
                                                    class="form-control mb-2" placeholder="Organization Address"
                                                    />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Enter the business address.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->

                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Inventory-->

                                    <!--begin::Media-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Business Registration Documents <small>{{$this->org['registration_docs'] ? "Uploaded" : "Unavailable"}}</small></h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-2">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone" id="kt_ecommerce_add_product_media">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <input type="file" wire:model="org.registration_docs"
                                                            id="" class="form-control">
                                                        <div class="ms-4">
                                                            <h5 class="fs-7 fw-bold text-gray-900 mb-1">Drop files here
                                                                or
                                                                click
                                                                to upload.</h5>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->
                                            @error('registration_docs')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <!--end::Input group-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Upload the business registration documents
                                                here.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Media-->
                                    <!--begin::Media-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Insurance Documents <small>{{$this->org['insurance_docs'] ? "Uploaded" : "Unavailable"}}</small></h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-2">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone" id="kt_ecommerce_add_product_media">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <input type="file" wire:model="org.insurance_docs"
                                                            id="" class="form-control">
                                                        <div class="ms-4">
                                                            <h5 class="fs-7 fw-bold text-gray-900 mb-1">Drop files here
                                                                or
                                                                click
                                                                to upload.</h5>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->
                                            @error('insurance_docs')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <!--end::Input group-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Uploads documents about insurance coverage on
                                                cargo
                                                and
                                                vehicles</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Media-->
                                    <!--begin::Card-->
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <!--begin::Card header-->
                                        <div class="card-header border-0">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h2>Account Details</h2>
                                            </div>
                                            <!--end::Card title-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0 pb-5">
                                            <!--begin::Table wrapper-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed gy-5"
                                                    id="kt_table_users_login_session">
                                                    <!--begin::Table body-->
                                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                                        <tr>
                                                            <td>Email</td>
                                                            <td><input type="email" wire:model="org.email"
                                                                    id="" class="form-control"></td>
                                                            {{-- <td class="text-end">
                                                                <button type="button"
                                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#kt_modal_update_phone">
                                                                    <i class="ki-duotone ki-pencil fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </button>
                                                            </td> --}}
                                                        </tr>
                                                        <tr>
                                                            <td>Password</td>
                                                            <td><button type="button"
                                                                class="btn btn-icon btn-warning w-150px h-30px ms-auto">
                                                               Reset Password
                                                            </button></td>

                                                        </tr>
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Table wrapper-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                            <div class="{{ $general ? 'd-flex' : 'd-none' }} justify-content-end">
                                <!--begin::Button-->
                                <a href="/apps/ecommerce/catalog/organizations"
                                    id="kt_ecommerce_add_organization_cancel" class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_organization_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label" wire:loading.remove>Update Changes</span>
                                    <span class="indicator-progress" wire:loading>Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </form>
                        <!--end::Tab pane-->

                        <!--begin::Tab pane-->
                        <form wire:submit.prevent="routes" method="post" class="{{ $routes ? '' : 'd-none' }}">
                            <div class="tab-pane fade {{ $routes ? 'show active' : '' }} mb-4"
                                id="kt_ecommerce_add_organization_advanced" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10 mt-10">
                                    <!--begin::Variations-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Preferred Route</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class=""
                                                data-kt-ecommerce-catalog-add-organization="auto-options">
                                                <!--begin::Label-->
                                                <label class="form-label">Add Your Preferred Route(s)</label>
                                                <!--end::Label-->
                                                <!--begin::Repeater-->
                                                <div id="kt_ecommerce_add_organization_options">
                                                    <!--begin::Form group-->
                                                    <div class="form-group">
                                                        <div data-repeater-list="kt_ecommerce_add_organization_options"
                                                            class="d-flex flex-column gap-3">
                                                            @for ($i=0;$i<count($this->org_routes);$i++)
                                                            <div data-repeater-item=""
                                                                class="form-group d-flex flex-wrap align-items-center gap-5">

                                                                <!--begin::Input-->
                                                                <input type="text"
                                                                    class="form-control mw-100 w-300px"
                                                                    wire:model="org_routes.{{$i}}.origin" placeholder="From" />

                                                                <input type="text"
                                                                    class="form-control mw-100 w-300px"
                                                                    wire:model="org_routes.{{$i}}.destination" />
                                                                <!--end::Input-->
                                                                <button type="button" data-repeater-delete=""
                                                                    class="btn btn-sm btn-icon btn-light-danger">
                                                                    <i class="ki-duotone ki-cross fs-1">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </button>
                                                            </div>
                                                            @endfor
                                                            {{-- <div data-repeater-item=""
                                                                class="form-group d-flex flex-wrap align-items-center gap-5">
                                                                <!--begin::Input-->
                                                                <input type="text" class="form-control mw-100 w-300px"
                                                                wire:model="org_source" placeholder="From" />

                                                                <!--begin::Input-->
                                                                <input type="text" class="form-control mw-100 w-300px"
                                                                wire:model="org_dest" placeholder="To" />
                                                                <!--end::Input-->
                                                                <button type="button" data-repeater-delete=""
                                                                    class="btn btn-sm btn-icon btn-light-danger">
                                                                    <i class="ki-duotone ki-cross fs-1">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </button>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <!--end::Form group-->
                                                    <!--begin::Form group-->
                                                    <div class="form-group mt-5">
                                                        <button type="button" wire:click="addRoute({{count($this->org_routes)+1}})"
                                                            class="btn btn-sm btn-light-primary">
                                                            <i class="ki-duotone ki-plus fs-2"></i>Add another
                                                            route</button>
                                                    </div>
                                                    <!--end::Form group-->
                                                </div>
                                                <!--end::Repeater-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Variations-->
                                    <!--begin::Inventory-->
                                    {{-- <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Fleet</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Notice-->
                                            <div
                                                class="notice d-flex bg-light-primary rounded border-primary border border-dashed rounded-3 p-6">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack flex-grow-1">
                                                    <!--begin::Content-->
                                                    <div class="fw-semibold">
                                                        <h4 class="text-gray-900 fw-bold">This is a very important
                                                            privacy
                                                            notice!</h4>
                                                        <div class="fs-6 text-gray-700">Writing headlines for blog
                                                            posts is
                                                            much
                                                            science and probably cool audience.
                                                            <a href="#" class="fw-bold">Learn more</a>.
                                                        </div>
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Notice-->
                                            <!--begin::Input group-->
                                            <!--begin::Pricing-->
                                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                                <!--begin::Card header-->
                                                <div class="card-header">
                                                    <!--begin::Card title-->
                                                    <div class="card-title">
                                                        <h2 class="fw-bold">Vehicles</h2>
                                                    </div>
                                                    <!--begin::Card title-->
                                                    <!--begin::Card toolbar-->
                                                    <div class="card-toolbar">
                                                        <button type="button" class="btn btn-light-primary">Add
                                                            Vehicle</button>
                                                    </div>
                                                    <!--end::Card toolbar-->
                                                </div>
                                                <!--end::Card header-->
                                                <!--begin::Card body-->
                                                <div class="card-body pt-0">
                                                    <!--begin::Table wrapper-->
                                                    <div class="table-responsive">
                                                        <!--begin::Table-->
                                                        <table
                                                            class="table align-middle table-row-dashed fs-6 fw-semibold gy-4"
                                                            id="kt_subscription_products_table">
                                                            <thead>
                                                                <tr
                                                                    class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                    <th class="min-w-200px">Type</th>
                                                                    <th class="min-w-200px">Number Plate</th>
                                                                    <th class="min-w-150px">Driver Assigned</th>
                                                                    <th class="min-w-70px text-end">Remove</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-gray-600">
                                                                <tr>
                                                                    <td>Box Truck</td>
                                                                    <td>GR 590 A</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-light-success">Yes</span>
                                                                    </td>
                                                                    <td class="text-end row">
                                                                        <!--begin::Delete-->
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3"
                                                                            data-bs-toggle="tooltip" title="Edit"
                                                                            data-kt-action="product_remove">
                                                                            <i class="ki-duotone ki-pencil fs-3">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                                <span class="path3"></span>
                                                                                <span class="path4"></span>
                                                                                <span class="path5"></span>
                                                                            </i>
                                                                        </a>
                                                                        <!--end::Delete-->
                                                                        <!--begin::Delete-->
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-flex btn-active-light-danger w-30px h-30px me-3"
                                                                            data-bs-toggle="tooltip" title="Delete"
                                                                            data-kt-action="product_remove">
                                                                            <i class="ki-duotone ki-trash fs-3">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                                <span class="path3"></span>
                                                                                <span class="path4"></span>
                                                                                <span class="path5"></span>
                                                                            </i>
                                                                        </a>
                                                                        <!--end::Delete-->
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>FlatBed Truck</td>
                                                                    <td>GR 484 C</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-light-danger">No</span>
                                                                    </td>
                                                                    <td class="text-end row">
                                                                        <!--begin::Delete-->
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3"
                                                                            data-bs-toggle="tooltip" title="Edit"
                                                                            data-kt-action="product_remove">
                                                                            <i class="ki-duotone ki-pencil fs-3">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                                <span class="path3"></span>
                                                                                <span class="path4"></span>
                                                                                <span class="path5"></span>
                                                                            </i>
                                                                        </a>
                                                                        <!--end::Delete-->
                                                                        <!--begin::Delete-->
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-flex btn-active-light-danger w-30px h-30px me-3"
                                                                            data-bs-toggle="tooltip" title="Delete"
                                                                            data-kt-action="product_remove">
                                                                            <i class="ki-duotone ki-trash fs-3">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                                <span class="path3"></span>
                                                                                <span class="path4"></span>
                                                                                <span class="path5"></span>
                                                                            </i>
                                                                        </a>
                                                                        <!--end::Delete-->
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Refrigerated Truck</td>
                                                                    <td>GR 0909 A</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-light-success">Yes</span>
                                                                    </td>
                                                                    <td class="text-end row">
                                                                        <!--begin::Delete-->
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3"
                                                                            data-bs-toggle="tooltip" title="Edit"
                                                                            data-kt-action="product_remove">
                                                                            <i class="ki-duotone ki-pencil fs-3">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                                <span class="path3"></span>
                                                                                <span class="path4"></span>
                                                                                <span class="path5"></span>
                                                                            </i>
                                                                        </a>
                                                                        <!--end::Delete-->
                                                                        <!--begin::Delete-->
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-flex btn-active-light-danger w-30px h-30px me-3"
                                                                            data-bs-toggle="tooltip" title="Delete"
                                                                            data-kt-action="product_remove">
                                                                            <i class="ki-duotone ki-trash fs-3">
                                                                                <span class="path1"></span>
                                                                                <span class="path2"></span>
                                                                                <span class="path3"></span>
                                                                                <span class="path4"></span>
                                                                                <span class="path5"></span>
                                                                            </i>
                                                                        </a>
                                                                        <!--end::Delete-->
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Table wrapper-->
                                                </div>
                                                <!--end::Card body-->
                                            </div>
                                            <!--end::Pricing-->




                                        </div>
                                        <!--end::Card header-->
                                    </div> --}}
                                    <!--end::Inventory-->

                                </div>
                            </div>
                            <div class="{{ $routes ? 'd-flex' : 'd-none' }} justify-content-end">
                                <!--begin::Button-->
                                <a href="/apps/ecommerce/catalog/organizations"
                                    id="kt_ecommerce_add_organization_cancel" class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_organization_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label" wire:loading.remove>Update Changes</span>
                                    <span class="indicator-progress" wire:loading>Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </form>
                        <!--end::Tab pane-->
                        <form wire:submit.prevent="subscription" method="post" class="{{ $subscription ? '' : 'd-none' }}">
                            <div class="tab-pane fade {{ $subscription ? 'show active' : '' }}"
                                id="kt_ecommerce_biling_and_shipping_info" role="tab-panel">
                                <!--begin::Notice-->
                                <div
                                    class="notice d-flex bg-light-warning rounded border-warning border border-dashed rounded-3 p-6">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <!--begin::Content-->
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">Money will be charged from this account!
                                            </h4>
                                            <div class="fs-6 text-gray-700">We are expecting the account information
                                                you will
                                                be
                                                using to pay for your subscriptions.
                                                <a href="#" class="fw-bold">Learn more</a>.
                                            </div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Notice-->
                                <!--begin::Payment method-->
                                <div class="card card-flush pt-3 mb-5 mb-lg-10 mt-10"
                                    data-kt-subscriptions-form="pricing">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2 class="fw-bold">Subscription Payment Method</h2>
                                        </div>
                                        <!--begin::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <a href="#" class="btn btn-light-primary" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_new_card">New Method</a>
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Options-->
                                        <div id="kt_create_new_payment_method">
                                            <!--begin::Option-->
                                            <div class="py-1">
                                                <!--begin::Header-->
                                                <div class="py-3 d-flex flex-stack flex-wrap">
                                                    <!--begin::Toggle-->
                                                    <div class="d-flex align-items-center collapsible toggle"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#kt_create_new_payment_method_1">
                                                        <!--begin::Arrow-->
                                                        <div
                                                            class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                                            <i
                                                                class="ki-duotone ki-minus-square toggle-on text-primary fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            <i class="ki-duotone ki-plus-square toggle-off fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </div>
                                                        <!--end::Arrow-->
                                                        <!--begin::Logo-->
                                                        <img src="../assets/media/svg/card-logos/mastercard.svg"
                                                            class="w-40px me-3" alt="" />
                                                        <!--end::Logo-->
                                                        <!--begin::Summary-->
                                                        <div class="me-3">
                                                            <div class="d-flex align-items-center fw-bold">Mastercard
                                                                <div class="badge badge-light-primary ms-5">Primary
                                                                </div>
                                                            </div>
                                                            <div class="text-muted">Expires Dec 2024</div>
                                                        </div>
                                                        <!--end::Summary-->
                                                    </div>
                                                    <!--end::Toggle-->
                                                    <!--begin::Input-->
                                                    <div class="d-flex my-3 ms-9">
                                                        <!--begin::Radio-->
                                                        <label
                                                            class="form-check form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="radio"
                                                                wire:model="debit_method" checked="checked" />
                                                        </label>
                                                        <!--end::Radio-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div id="kt_create_new_payment_method_1"
                                                    class="collapse show fs-6 ps-10">
                                                    <!--begin::Details-->
                                                    <div class="d-flex flex-wrap py-5">
                                                        <!--begin::Col-->
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Name
                                                                    </td>
                                                                    <td class="text-gray-800">Emma Smith</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Number
                                                                    </td>
                                                                    <td class="text-gray-800">**** 8056</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Expires
                                                                    </td>
                                                                    <td class="text-gray-800">12/2024</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Type
                                                                    </td>
                                                                    <td class="text-gray-800">Mastercard credit card
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Issuer
                                                                    </td>
                                                                    <td class="text-gray-800">VICBANK</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">ID</td>
                                                                    <td class="text-gray-800">id_4325df90sdf8</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="flex-equal">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Billing
                                                                        address
                                                                    </td>
                                                                    <td class="text-gray-800">AU</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Phone
                                                                    </td>
                                                                    <td class="text-gray-800">No phone provided</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Email
                                                                    </td>
                                                                    <td class="text-gray-800">
                                                                        <a href="#"
                                                                            class="text-gray-900 text-hover-primary">smith@kpmg.com</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Origin
                                                                    </td>
                                                                    <td class="text-gray-800">Australia
                                                                        <div
                                                                            class="symbol symbol-20px symbol-circle ms-2">
                                                                            <img
                                                                                src="../assets/media/flags/australia.svg" />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">CVC
                                                                        check</td>
                                                                    <td class="text-gray-800">Passed
                                                                        <i
                                                                            class="ki-duotone ki-check-circle fs-2 text-success">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                            <div class="separator separator-dashed"></div>
                                            <!--begin::Option-->
                                            <div class="py-1">
                                                <!--begin::Header-->
                                                <div class="py-3 d-flex flex-stack flex-wrap">
                                                    <!--begin::Toggle-->
                                                    <div class="d-flex align-items-center collapsible toggle collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#kt_create_new_payment_method_2">
                                                        <!--begin::Arrow-->
                                                        <div
                                                            class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                                            <i
                                                                class="ki-duotone ki-minus-square toggle-on text-primary fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            <i class="ki-duotone ki-plus-square toggle-off fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </div>
                                                        <!--end::Arrow-->
                                                        <!--begin::Logo-->
                                                        <img src="../assets/media/svg/card-logos/visa.svg"
                                                            class="w-40px me-3" alt="" />
                                                        <!--end::Logo-->
                                                        <!--begin::Summary-->
                                                        <div class="me-3">
                                                            <div class="d-flex align-items-center fw-bold">Visa</div>
                                                            <div class="text-muted">Expires Feb 2022</div>
                                                        </div>
                                                        <!--end::Summary-->
                                                    </div>
                                                    <!--end::Toggle-->
                                                    <!--begin::Input-->
                                                    {{-- <div class="d-flex my-3 ms-9">
                                                        <!--begin::Radio-->
                                                        <label class="form-check form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="radio"
                                                                wire:model="payment_method" />
                                                        </label>
                                                        <!--end::Radio-->
                                                    </div> --}}
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div id="kt_create_new_payment_method_2" class="collapse fs-6 ps-10">
                                                    <!--begin::Details-->
                                                    <div class="d-flex flex-wrap py-5">
                                                        <!--begin::Col-->
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Name
                                                                    </td>
                                                                    <td class="text-gray-800">Melody Macy</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Number
                                                                    </td>
                                                                    <td class="text-gray-800">**** 3597</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Expires
                                                                    </td>
                                                                    <td class="text-gray-800">02/2022</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Type
                                                                    </td>
                                                                    <td class="text-gray-800">Visa credit card</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Issuer
                                                                    </td>
                                                                    <td class="text-gray-800">ENBANK</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">ID</td>
                                                                    <td class="text-gray-800">id_w2r84jdy723</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="flex-equal">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Billing
                                                                        address
                                                                    </td>
                                                                    <td class="text-gray-800">UK</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Phone
                                                                    </td>
                                                                    <td class="text-gray-800">No phone provided</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Email
                                                                    </td>
                                                                    <td class="text-gray-800">
                                                                        <a href="#"
                                                                            class="text-gray-900 text-hover-primary">melody@altbox.com</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Origin
                                                                    </td>
                                                                    <td class="text-gray-800">United Kingdom
                                                                        <div
                                                                            class="symbol symbol-20px symbol-circle ms-2">
                                                                            <img
                                                                                src="../assets/media/flags/united-kingdom.svg" />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">CVC
                                                                        check</td>
                                                                    <td class="text-gray-800">Passed
                                                                        <i
                                                                            class="ki-duotone ki-check fs-2 text-success"></i>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                            <div class="separator separator-dashed"></div>
                                            <!--begin::Option-->
                                            <div class="py-1">
                                                <!--begin::Header-->
                                                <div class="py-3 d-flex flex-stack flex-wrap">
                                                    <!--begin::Toggle-->
                                                    <div class="d-flex align-items-center collapsible toggle collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#kt_create_new_payment_method_3">
                                                        <!--begin::Arrow-->
                                                        <div
                                                            class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                                            <i
                                                                class="ki-duotone ki-minus-square toggle-on text-primary fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            <i class="ki-duotone ki-plus-square toggle-off fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </div>
                                                        <!--end::Arrow-->
                                                        <!--begin::Logo-->
                                                        <img src="../assets/media/svg/card-logos/american-express.svg"
                                                            class="w-40px me-3" alt="" />
                                                        <!--end::Logo-->
                                                        <!--begin::Summary-->
                                                        <div class="me-3">
                                                            <div class="d-flex align-items-center fw-bold">American
                                                                Express
                                                                <div class="badge badge-light-danger ms-5">Expired
                                                                </div>
                                                            </div>
                                                            <div class="text-muted">Expires Aug 2021</div>
                                                        </div>
                                                        <!--end::Summary-->
                                                    </div>
                                                    <!--end::Toggle-->
                                                    <!--begin::Input-->
                                                    <div class="d-flex my-3 ms-9">
                                                        <!--begin::Radio-->
                                                        <label
                                                            class="form-check form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="radio"
                                                                name="payment_method" />
                                                        </label>
                                                        <!--end::Radio-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div id="kt_create_new_payment_method_3" class="collapse fs-6 ps-10">
                                                    <!--begin::Details-->
                                                    <div class="d-flex flex-wrap py-5">
                                                        <!--begin::Col-->
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Name
                                                                    </td>
                                                                    <td class="text-gray-800">Max Smith</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Number
                                                                    </td>
                                                                    <td class="text-gray-800">**** 9826</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Expires
                                                                    </td>
                                                                    <td class="text-gray-800">08/2021</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Type
                                                                    </td>
                                                                    <td class="text-gray-800">American express credit
                                                                        card</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Issuer
                                                                    </td>
                                                                    <td class="text-gray-800">USABANK</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">ID</td>
                                                                    <td class="text-gray-800">id_89457jcje63</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="flex-equal">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Billing
                                                                        address
                                                                    </td>
                                                                    <td class="text-gray-800">US</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Phone
                                                                    </td>
                                                                    <td class="text-gray-800">No phone provided</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Email
                                                                    </td>
                                                                    <td class="text-gray-800">
                                                                        <a href="#"
                                                                            class="text-gray-900 text-hover-primary">max@kt.com</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Origin
                                                                    </td>
                                                                    <td class="text-gray-800">United States of America
                                                                        <div
                                                                            class="symbol symbol-20px symbol-circle ms-2">
                                                                            <img
                                                                                src="../assets/media/flags/united-states.svg" />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">CVC
                                                                        check</td>
                                                                    <td class="text-gray-800">Failed
                                                                        <i
                                                                            class="ki-duotone ki-cross fs-2 text-danger">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Payment method-->
                            </div>
                            <div class="{{ $subscription ? 'd-flex' : 'd-none' }} justify-content-end">
                                <!--begin::Button-->
                                <a href="/apps/ecommerce/catalog/organizations"
                                    id="kt_ecommerce_add_organization_cancel" class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_organization_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label" wire:loading.remove>Update Changes</span>
                                    <span class="indicator-progress" wire:loading>Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </form>

                        <form wire:submit.prevent="payin" method="post" class="{{ $payin ? '' : 'd-none' }}">
                            <div class="tab-pane fade {{ $payin ? 'show active' : '' }}"
                                id="kt_ecommerce_payIn_account" role="tab-panel">
                                <!--begin::Notice-->
                                <div
                                    class="notice d-flex bg-light-primary rounded border-primary border border-dashed rounded-3 p-6">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <!--begin::Content-->
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">Money will be paid into this account!
                                            </h4>
                                            <div class="fs-6 text-gray-700">We are expecting the account information we
                                                can pay
                                                into for your fleet services.
                                                <a href="#" class="fw-bold">Learn more</a>.
                                            </div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>

                                <!--begin::Payment method-->
                                <div class="card card-flush pt-3 mb-5 mb-lg-10 mt-10"
                                    data-kt-subscriptions-form="pricing">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2 class="fw-bold">Subscription Payment Method</h2>
                                        </div>
                                        <!--begin::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <a href="#" class="btn btn-light-primary" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_new_card">New Method</a>
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Options-->
                                        <div id="kt_create_new_payment_method">
                                            <!--begin::Option-->
                                            <div class="py-1">
                                                <!--begin::Header-->
                                                <div class="py-3 d-flex flex-stack flex-wrap">
                                                    <!--begin::Toggle-->
                                                    <div class="d-flex align-items-center collapsible toggle"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#kt_create_new_payment_method_1">
                                                        <!--begin::Arrow-->
                                                        <div
                                                            class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                                            <i
                                                                class="ki-duotone ki-minus-square toggle-on text-primary fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            <i class="ki-duotone ki-plus-square toggle-off fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </div>
                                                        <!--end::Arrow-->
                                                        <!--begin::Logo-->
                                                        <img src="../assets/media/svg/card-logos/mastercard.svg"
                                                            class="w-40px me-3" alt="" />
                                                        <!--end::Logo-->
                                                        <!--begin::Summary-->
                                                        <div class="me-3">
                                                            <div class="d-flex align-items-center fw-bold">Mastercard
                                                                <div class="badge badge-light-primary ms-5">Primary
                                                                </div>
                                                            </div>
                                                            <div class="text-muted">Expires Dec 2024</div>
                                                        </div>
                                                        <!--end::Summary-->
                                                    </div>
                                                    <!--end::Toggle-->
                                                    <!--begin::Input-->
                                                    <div class="d-flex my-3 ms-9">
                                                        <!--begin::Radio-->
                                                        <label
                                                            class="form-check form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="radio"
                                                                name="payment_method" checked="checked" />
                                                        </label>
                                                        <!--end::Radio-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div id="kt_create_new_payment_method_1"
                                                    class="collapse show fs-6 ps-10">
                                                    <!--begin::Details-->
                                                    <div class="d-flex flex-wrap py-5">
                                                        <!--begin::Col-->
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Name
                                                                    </td>
                                                                    <td class="text-gray-800">Emma Smith</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Number
                                                                    </td>
                                                                    <td class="text-gray-800">**** 8056</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Expires
                                                                    </td>
                                                                    <td class="text-gray-800">12/2024</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Type
                                                                    </td>
                                                                    <td class="text-gray-800">Mastercard credit card
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Issuer
                                                                    </td>
                                                                    <td class="text-gray-800">VICBANK</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">ID</td>
                                                                    <td class="text-gray-800">id_4325df90sdf8</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="flex-equal">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Billing
                                                                        address
                                                                    </td>
                                                                    <td class="text-gray-800">AU</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Phone
                                                                    </td>
                                                                    <td class="text-gray-800">No phone provided</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Email
                                                                    </td>
                                                                    <td class="text-gray-800">
                                                                        <a href="#"
                                                                            class="text-gray-900 text-hover-primary">smith@kpmg.com</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Origin
                                                                    </td>
                                                                    <td class="text-gray-800">Australia
                                                                        <div
                                                                            class="symbol symbol-20px symbol-circle ms-2">
                                                                            <img
                                                                                src="../assets/media/flags/australia.svg" />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">CVC
                                                                        check</td>
                                                                    <td class="text-gray-800">Passed
                                                                        <i
                                                                            class="ki-duotone ki-check-circle fs-2 text-success">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                            <div class="separator separator-dashed"></div>
                                            <!--begin::Option-->
                                            <div class="py-1">
                                                <!--begin::Header-->
                                                <div class="py-3 d-flex flex-stack flex-wrap">
                                                    <!--begin::Toggle-->
                                                    <div class="d-flex align-items-center collapsible toggle collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#kt_create_new_payment_method_2">
                                                        <!--begin::Arrow-->
                                                        <div
                                                            class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                                            <i
                                                                class="ki-duotone ki-minus-square toggle-on text-primary fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            <i class="ki-duotone ki-plus-square toggle-off fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </div>
                                                        <!--end::Arrow-->
                                                        <!--begin::Logo-->
                                                        <img src="../assets/media/svg/card-logos/visa.svg"
                                                            class="w-40px me-3" alt="" />
                                                        <!--end::Logo-->
                                                        <!--begin::Summary-->
                                                        <div class="me-3">
                                                            <div class="d-flex align-items-center fw-bold">Visa</div>
                                                            <div class="text-muted">Expires Feb 2022</div>
                                                        </div>
                                                        <!--end::Summary-->
                                                    </div>
                                                    <!--end::Toggle-->
                                                    <!--begin::Input-->
                                                    <div class="d-flex my-3 ms-9">
                                                        <!--begin::Radio-->
                                                        <label
                                                            class="form-check form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="radio"
                                                                name="payment_method" />
                                                        </label>
                                                        <!--end::Radio-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div id="kt_create_new_payment_method_2" class="collapse fs-6 ps-10">
                                                    <!--begin::Details-->
                                                    <div class="d-flex flex-wrap py-5">
                                                        <!--begin::Col-->
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Name
                                                                    </td>
                                                                    <td class="text-gray-800">Melody Macy</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Number
                                                                    </td>
                                                                    <td class="text-gray-800">**** 3597</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Expires
                                                                    </td>
                                                                    <td class="text-gray-800">02/2022</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Type
                                                                    </td>
                                                                    <td class="text-gray-800">Visa credit card</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Issuer
                                                                    </td>
                                                                    <td class="text-gray-800">ENBANK</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">ID</td>
                                                                    <td class="text-gray-800">id_w2r84jdy723</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="flex-equal">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Billing
                                                                        address
                                                                    </td>
                                                                    <td class="text-gray-800">UK</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Phone
                                                                    </td>
                                                                    <td class="text-gray-800">No phone provided</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Email
                                                                    </td>
                                                                    <td class="text-gray-800">
                                                                        <a href="#"
                                                                            class="text-gray-900 text-hover-primary">melody@altbox.com</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Origin
                                                                    </td>
                                                                    <td class="text-gray-800">United Kingdom
                                                                        <div
                                                                            class="symbol symbol-20px symbol-circle ms-2">
                                                                            <img
                                                                                src="../assets/media/flags/united-kingdom.svg" />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">CVC
                                                                        check</td>
                                                                    <td class="text-gray-800">Passed
                                                                        <i
                                                                            class="ki-duotone ki-check fs-2 text-success"></i>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                            <div class="separator separator-dashed"></div>
                                            <!--begin::Option-->
                                            <div class="py-1">
                                                <!--begin::Header-->
                                                <div class="py-3 d-flex flex-stack flex-wrap">
                                                    <!--begin::Toggle-->
                                                    <div class="d-flex align-items-center collapsible toggle collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#kt_create_new_payment_method_3">
                                                        <!--begin::Arrow-->
                                                        <div
                                                            class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                                            <i
                                                                class="ki-duotone ki-minus-square toggle-on text-primary fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            <i class="ki-duotone ki-plus-square toggle-off fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </div>
                                                        <!--end::Arrow-->
                                                        <!--begin::Logo-->
                                                        <img src="../assets/media/svg/card-logos/american-express.svg"
                                                            class="w-40px me-3" alt="" />
                                                        <!--end::Logo-->
                                                        <!--begin::Summary-->
                                                        <div class="me-3">
                                                            <div class="d-flex align-items-center fw-bold">American
                                                                Express
                                                                <div class="badge badge-light-danger ms-5">Expired
                                                                </div>
                                                            </div>
                                                            <div class="text-muted">Expires Aug 2021</div>
                                                        </div>
                                                        <!--end::Summary-->
                                                    </div>
                                                    <!--end::Toggle-->
                                                    <!--begin::Input-->
                                                    <div class="d-flex my-3 ms-9">
                                                        <!--begin::Radio-->
                                                        <label
                                                            class="form-check form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="radio"
                                                                name="payment_method" />
                                                        </label>
                                                        <!--end::Radio-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div id="kt_create_new_payment_method_3" class="collapse fs-6 ps-10">
                                                    <!--begin::Details-->
                                                    <div class="d-flex flex-wrap py-5">
                                                        <!--begin::Col-->
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Name
                                                                    </td>
                                                                    <td class="text-gray-800">Max Smith</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Number
                                                                    </td>
                                                                    <td class="text-gray-800">**** 9826</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Expires
                                                                    </td>
                                                                    <td class="text-gray-800">08/2021</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Type
                                                                    </td>
                                                                    <td class="text-gray-800">American express credit
                                                                        card</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Issuer
                                                                    </td>
                                                                    <td class="text-gray-800">USABANK</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">ID</td>
                                                                    <td class="text-gray-800">id_89457jcje63</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="flex-equal">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Billing
                                                                        address
                                                                    </td>
                                                                    <td class="text-gray-800">US</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Phone
                                                                    </td>
                                                                    <td class="text-gray-800">No phone provided</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Email
                                                                    </td>
                                                                    <td class="text-gray-800">
                                                                        <a href="#"
                                                                            class="text-gray-900 text-hover-primary">max@kt.com</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Origin
                                                                    </td>
                                                                    <td class="text-gray-800">United States of America
                                                                        <div
                                                                            class="symbol symbol-20px symbol-circle ms-2">
                                                                            <img
                                                                                src="assets/media/flags/united-states.svg" />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">CVC
                                                                        check</td>
                                                                    <td class="text-gray-800">Failed
                                                                        <i
                                                                            class="ki-duotone ki-cross fs-2 text-danger">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Payment method-->
                            </div>
                            <div class="{{ $payin ? 'd-flex' : 'd-none' }} justify-content-end">
                                <!--begin::Button-->
                                <a href="/apps/ecommerce/catalog/organizations"
                                    id="kt_ecommerce_add_organization_cancel" class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_organization_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label" wire:loading.remove>Update Changes</span>
                                    <span class="indicator-progress" wire:loading>Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </form>

                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Main column-->
            </div>
            <!--end::Form-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    @include('partials.modals.add_payment_method')
    @include('partials.modals.add_org_preference')
    @include('partials.modals.add_vehicle')
</div>
