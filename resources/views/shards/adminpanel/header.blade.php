 <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
     id="kt_app_header_container">
     <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
         <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
             <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                 <span class="path1"></span>
                 <span class="path2"></span>
             </i>
         </div>
     </div>
     <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
         <a href="{{ route('admin.companies') }}" class="d-lg-none">
             <img alt="Logo" src="{{ asset('assets/media/logos/logo.png') }}" class="h-30px theme-light-show" />
             <img alt="Logo" src="{{ asset('assets/media/logos/logo-dark.png') }}" class="h-30px theme-dark-show" />
         </a>
     </div>
     <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
         <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
             data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
             data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
             data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
             data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
             data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
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
                     <div class="symbol symbol-50px">
                        @if (Auth::user()->profile && file_exists(public_path(Auth::user()->profile)))
                            <div class="symbol symbol-50px">
                                <img src="{{ asset(Auth::user()->profile) }}" width="32" height="32"
                                    alt="">
                            </div>
                        @else
                            <div class="symbol-label fs-2 fw-semibold primary-color-btn">
                                {{ Str::substr(Auth::user()->first_name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                 </div>
                 <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                     data-kt-menu="true">
                     <div class="menu-item px-5">
                         <a href="{{ route('admin.manage_profile') }}" class="menu-link px-5">Manage profile</a>
                     </div>
                     <div class="menu-item px-5">
                         <a href="{{ route('admin.sign_out') }}" class="menu-link px-5"
                             onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign
                             Out</a>
                         <form id="logout-form" action="{{ route('admin.sign_out') }}" method="POST"
                             style="display: none;">
                             @csrf
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
