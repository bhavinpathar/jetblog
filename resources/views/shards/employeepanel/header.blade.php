@php
    $dashboard_link = '';
    if (auth()->check() && auth()->user()->role_id == 1) {
        $dashboard_link = route('admin.dashboard');
    }

    if (auth()->check() && (auth()->user()->role_id == 3 || auth()->user()->role_id == 2)) {
        $dashboard_link = route('dashboard');
    }

@endphp
<div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">

        <a href="">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo.png') }}"
                class="h-40px h-lg-45px app-sidebar-logo-default theme-light-show" />
            <img alt="Logo" src="{{ asset('assets/media/logos/logo-dark.png') }}"
                class="h-40px h-lg-45px app-sidebar-logo-default theme-dark-show" />
        </a>
    </div>
    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
            data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
            data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
            <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                id="kt_app_header_menu" data-kt-menu="true">
                <div class="menu-item my-1">
                    <a href="{{ route('users.list') }}" class="menu-link px-4 {{ request()->is('/') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-home fs-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Users</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="app-navbar flex-shrink-0">
            <div class="app-navbar-item ms-1 ms-md-3">
                <a href="#"
                    class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px"
                    data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                    data-kt-menu-placement="bottom-end">
                    <i class="ki-duotone ki-night-day theme-light-show fs-2 fs-lg-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                        <span class="path6"></span>
                        <span class="path7"></span>
                        <span class="path8"></span>
                        <span class="path9"></span>
                        <span class="path10"></span>
                    </i>
                    <i class="ki-duotone ki-moon theme-dark-show fs-2 fs-lg-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </a>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                    data-kt-menu="true" data-kt-element="theme-mode-menu">
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                            <span class="menu-icon" data-kt-element="icon">
                                <i class="ki-duotone ki-night-day fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                    <span class="path7"></span>
                                    <span class="path8"></span>
                                    <span class="path9"></span>
                                    <span class="path10"></span>
                                </i>
                            </span>
                            <span class="menu-title">Light</span>
                        </a>
                    </div>
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                            <span class="menu-icon" data-kt-element="icon">
                                <i class="ki-duotone ki-moon fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Dark</span>
                        </a>
                    </div>
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                            <span class="menu-icon" data-kt-element="icon">
                                <i class="ki-duotone ki-screen fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">System</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                    data-kt-menu-placement="bottom-end">
                    <div class="symbol symbol-50px profile">
                        <div class="symbol-label fs-2 fw-semibold secondary-color-btn">
                            A
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
