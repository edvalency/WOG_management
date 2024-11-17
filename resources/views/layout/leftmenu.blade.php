<div id="kt_app_sidebar" class="app-sidebar flex-column bg-dark" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="/">
            {{-- <<img alt="Logo" src="assets/media/logo.png" class="h-25px app-sidebar-logo-default" /> --}}
            {{-- <img alt="Logo" src="assets/media/logo.png" class="h-20px app-sidebar-logo-minimize" /> --}}
            <span class="text-white h-25px app-sidebar-logo-default" style="font-size: 19px;">WOGMS</span>
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <!--begin::Minimized sidebar setup:
            if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") {
            1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
            2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
            3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
            4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
            }
        -->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <span class="text-white text-center fs-4 mt-3">@yield('role-name')</span>
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div class="menu-item mb-3"><!--begin:Menu link--><a class="menu-link @yield('dashboard')"
                        href="{{ route('home') }}"><span class="menu-icon"><i class="ki-duotone ki-home fs-1"><span
                                    class="path1"></span><span class="path2"></span></i></span><span
                            class="menu-title">Dashboard</span></a><!--end:Menu link--></div>

                <div class="menu-item mb-3"><!--begin:Menu link--><a class="menu-link @yield('members')"
                        href="{{ route('members.show') }}"><span class="menu-icon"><i class="fa fa-users fs-4"><span
                                    class="path1"></span><span class="path2"></span></i></span><span
                            class="menu-title">Members</span></a><!--end:Menu link--></div>
                @if (hasRole('attendance'))
                    <div class="menu-item mb-3"><!--begin:Menu link--><a class="menu-link @yield('attendance')"
                            href="{{ route('attendance') }}"><span class="menu-icon"><i
                                class="ki-duotone ki-people fs-1"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span
                                    class="path4"></span></i></span><span
                                class="menu-title">Attendance</span></a><!--end:Menu link--></div>
                @endif
                @if (hasRole('revenue'))
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                class="ki-duotone ki-dollar fs-1"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span
                                    class="path4"></span></i></span><span class="menu-title">Revenue</span><span
                            class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->
                        {{-- <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                href="pages/user-profile/overview.html"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Overview</span></a><!--end:Menu link--></div> --}}
                        <!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link @yield('revenue')"
                                href="{{ route('revenue.show') }}"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">General</span></a><!--end:Menu link--></div>
                        <!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                href="{{ route('tithe.show') }}"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Tithe</span></a><!--end:Menu link--></div>

                    </div><!--end:Menu sub-->
                </div><!--end:Menu item-->
                    {{-- <div class="menu-item mb-3"><!--begin:Menu link--><a class="menu-link @yield('revenue')"
                            href="{{ route('revenue.show') }}"><span class="menu-icon"><i
                                    class="ki-duotone ki-dollar fs-1"><span class="path1"></span><span
                                        class="path2"></span></i></span><span
                                class="menu-title">Revenue</span></a><!--end:Menu link--></div> --}}
                @endif
                @if (hasRole('expenses'))
                    <div class="menu-item mb-3"><!--begin:Menu link--><a class="menu-link @yield('expenses')"
                            href="{{ route('expense.all') }}"><span class="menu-icon"><i
                                    class="ki-duotone ki-chart fs-1"><span class="path1"></span><span
                                        class="path2"></span></i></span><span
                                class="menu-title">Expenses</span></a><!--end:Menu link--></div>
                @endif
                @if (hasRole('welfare'))
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                    class="ki-duotone ki-colors-square fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i></span><span class="menu-title">Welfare</span><span
                                class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                    href="pages/user-profile/overview.html"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Overview</span></a><!--end:Menu link--></div>
                            <!--end:Menu item--><!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                    href="{{ route('welfare.show') }}"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Payments</span></a><!--end:Menu link--></div>
                            <!--end:Menu item--><!--begin:Menu item-->
                            <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                    href="{{ route('welfare.expenses') }}"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Expenses</span></a><!--end:Menu link--></div>

                        </div><!--end:Menu sub-->
                    </div><!--end:Menu item-->
                @endif
                @if (hasRole('admin'))
                    <!--begin:Menu item-->
                    <div class="menu-item mb-3"><!--begin:Menu link--><a class="menu-link @yield('users')"
                            href="{{ route('users') }}"><span class="menu-icon"><i
                                    class="ki-duotone ki-people fs-1"><span class="path1"></span><span
                                        class="path2"></span></i></span><span class="menu-title">User
                                Management</span></a><!--end:Menu link--></div>
                @endif




                {{-- <div class="menu-item mb-3"><!--begin:Menu link--><a class="menu-link @yield('sermons')"
                        href="{{ route('sermons.all') }}"><span class="menu-icon"><i
                                class="ki-duotone ki-speaker fs-1"><span class="path1"></span><span
                                    class="path2"></span></i></span><span
                            class="menu-title">Sermons</span></a><!--end:Menu link--></div>
                <div class="menu-item mb-3"><!--begin:Menu link--><a class="menu-link @yield('articles')"
                        href="{{ route('articles.all') }}"><span class="menu-icon"><i
                                class="ki-duotone ki-note fs-1"><span class="path1"></span><span
                                    class="path2"></span></i></span><span
                            class="menu-title">Articles</span></a><!--end:Menu link--></div> --}}

                {{--
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                class="ki-duotone ki-colors-square fs-1"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span
                                    class="path4"></span></i></span><span class="menu-title">User
                            Management</span><span
                            class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                href="pages/user-profile/overview.html"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Overview</span></a><!--end:Menu link--></div>
                        <!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                href="pages/user-profile/projects.html"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Projects</span></a><!--end:Menu link--></div>
                        <!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                href="pages/user-profile/campaigns.html"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Campaigns</span></a><!--end:Menu link--></div>
                        <!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                href="pages/user-profile/documents.html"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Documents</span></a><!--end:Menu link--></div>
                        <!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                href="pages/user-profile/followers.html"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Followers</span></a><!--end:Menu link--></div>
                        <!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                href="pages/user-profile/activity.html"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Activity</span></a><!--end:Menu link--></div>
                        <!--end:Menu item-->
                    </div><!--end:Menu sub-->
                </div><!--end:Menu item--><!--begin:Menu item--> --}}
            </div>
            <!--end::Menu wrapper-->
        </div>


    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    {{-- <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="https://preview.keenthemes.com/html/metronic/docs"
            class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
            title="200+ in-house components and 3rd-party plugins">
            <span class="btn-label">Docs & Components</span>
            <i class="ki-duotone ki-document btn-icon fs-2 m-0">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </a>
    </div> --}}
    <!--end::Footer-->
</div>
