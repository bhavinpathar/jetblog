<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../" />
    <title>@yield('title', 'Employee timer')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="shortcut icon" href="data:;base64,iVBORw0KGgo=" />
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    {{--
    <link href="{{ asset('assets/plugins/custom/datatables/jquery.dataTables.css') }}" rel="stylesheet"
        type="text/css" /> --}}
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/jkanban/jkanban.bundle.css') }}">
    <script src="{{ asset('assets/plugins/custom/jkanban/jkanban.bundle.js') }}"></script>

    @yield('css')

    <style>
        .error {
            background: transparent !important;
            color: red !important;
        }
    </style>

</head>

<body id="kt_app_body" data-kt-app-layout="light-header" data-kt-app-header-fixed="true"
    data-kt-app-toolbar-enabled="true" class="app-default">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <div id="kt_app_header" class="app-header">
                @include('shards.employeepanel.header')
            </div>
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        @include('shards.employeepanel.toolbar')
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->

                            {{-- @if (request()->is('mnopqradmin/dashboard')) --}}
                            {{-- <div id="kt_app_content_container" class="app-container container-fluid"> --}}
                            {{-- @else --}}
                            <div id="kt_app_content_container" class="app-container container-xxl container-fluid">
                                <div class="alert alert-dismissible bg-danger flex-column flex-sm-row p-5 mb-10"
                                    style="display: none" id="netnotification">
                                    <i class="ki-duotone ki-shield-cross fs-2hx text-light me-4 mb-5 mb-sm-0"><span
                                            class="path1"></span><span class="path2"></span><span
                                            class="path3"></span></i>
                                    <div class="subscription_expired">
                                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                                            <h4 class="mb-2 light">Network connection lost</h4>
                                            <span>Please check your internet connection.</span>
                                        </div>
                                    </div>
                                </div>
                                {{-- @endif --}}
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    @include('shards.employeepanel.footer')
                </div>
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    @yield('modal')
    <div class="modal fade" tabindex="-1" id="notification_model">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"></h3>
                    <div class="btn btn-icon btn-sm btn btn-light ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-solid ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <div>
                        <span class="confirmation_msg fw-bold"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <div id="custom-footer-button"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"
        integrity="sha512-TiQST7x/0aMjgVTcep29gi+q5Lk5gVTUPE9XgN0g96rwtjEjLpod4mlBRKWHeBcvGBAEvJBmfDqh2hfMMmg+5A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script> --}}
    {{-- <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script> --}}

    {{-- <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/custom/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/custom/datatables/responsive.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/custom/datatables/datatables_responsive.js') }}"></script> --}}
    {{-- <script disable-devtool-auto src='https://cdn.jsdelivr.net/npm/disable-devtool@latest'></script> --}}
    <script type="text/javascript">
        function checkConnectivity() {
            var netnotification = document.getElementById("netnotification");
            var isOnline = navigator.onLine;

            if (!isOnline) {
                netnotification.style.display = "flex";
            } else {
                netnotification.style.display = "none";
            }
        }
        // Event listener for online/offline events
        window.addEventListener("online", checkConnectivity);
        window.addEventListener("offline", checkConnectivity);

        //   Initial check when the page loads
        checkConnectivity();
        $('#notification_model').on('hidden.bs.modal', function() {
            $('div#notification_model #custom-footer-button').html('');
            $('div#notification_model .modal-title').text('');
            $('div#notification_model .modal-body .confirmation_msg').text('');
        });

        function handle_ajax_errors(xhr, alertPlace = 'notification') {
            if (xhr.status === 422) {
                if (typeof xhr.responseJSON.message === 'string') {
                    showDynamicAlert('danger', 'Error', xhr.responseJSON.message, alertPlace);
                } else if (typeof xhr.responseJSON.message === 'object') {
                    var errors = xhr.responseJSON.message;
                    var errormessages = '';
                    $.each(errors, function(field, message) {
                        errormessages += '<li>' + field + ' : ' + message + '</li>';
                    });
                    showDynamicAlert('danger', 'Error', errormessages, alertPlace);
                }
            } else {
                showDynamicAlert('danger', 'Error',
                    'An error occurred while processing your request. Please try again later.', alertPlace);
            }
        }

        function showDynamicAlert(type, title, message, place = "notification") {
            var icon = '';
            var place = $(`#${place}`);
            var color = 'bg-primary';
            if (type === 'success') {
                icon = 'ki-notification-bing';
                color = 'bg-success';
            } else if (type === 'danger') {
                icon = 'ki-notification-bing';
                color = 'bg-danger';
            }
            var dynamicAlert = '<div class="alert alert-dismissible ' + color +
                ' d-flex flex-column flex-sm-row p-5 mb-10">';
            dynamicAlert += '<i class="ki-duotone ' + icon +
                ' fs-2hx text-light me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>';
            dynamicAlert += '<div class="d-flex flex-column text-light pe-0 pe-sm-10">';
            dynamicAlert += '<h4 class="mb-2 light">' + title + '</h4>';
            dynamicAlert += '<span>' + message + '</span>';
            dynamicAlert += '</div>';
            dynamicAlert +=
                '<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">';
            dynamicAlert +=
                '<i class="ki-solid ki-cross fs-1 text-light"></i>';
            dynamicAlert += '</button>';
            dynamicAlert += '</div>';
            place.html(dynamicAlert);
        }
    </script>
    
    @yield('js')
</body>

</html>
