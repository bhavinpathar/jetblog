<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="{{ route('admin.companies') }}">
                <img alt="Logo" src="{{ asset('assets/media/logos/logo.png') }}" class="h-45px theme-light-show app-sidebar-logo-default" />
                <img alt="Logo" src="{{ asset('assets/media/logos/logo-dark.png') }}" class="h-45px theme-dark-show app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('assets/media/logos/favicon.png') }}"
                class="h-35px app-sidebar-logo-minimize" />
        </a>
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    {{-- <div class="menu-item">
                        <a class="menu-link {{ request()->route()->getName() === 'admin.dashboard'? 'active': '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-abstract-28 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </div> --}}
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('admin/users*') ? 'active' : '' }}" href="{{route('admin.companies')}}">
                            <span class="menu-icon">
                                <i class="fa-regular fa-building fs-6"></i>
                            </span>
                            <span class="menu-title">Companies list</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('admin/packages*') ? 'active' : '' }}" href="{{route('admin.packages.index')}}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-box-archive fs-6"></i>
                            </span>
                            <span class="menu-title">Packages list</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
