<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title','FBEX')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="data:;base64,iVBORw0KGgo=" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/employee/common.css')}}" rel="stylesheet" type="text/css" />
    @yield('css')
</head>
<body id="kt_body" class="app-blank">
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
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid  justify-content-center">
            @yield('content')
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="notification_model">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"></h3>
                    <div class="btn btn-icon btn-sm btn btn-light ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-solid ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <div>
                        <span class="confirmation_msg fw-bold text-dark"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var hostUrl = {!! json_encode(url('/')) !!};
    </script>
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script>
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
         function showDynamicAlert(type, title, message) {
            var icon = 'ki-notification-bing';
            var color = 'bg-primary';
            if (type === 'success') {
                icon = 'ki-notification-bing';
                color ='bg-success';
            } else if (type === 'danger') {
                icon = 'ki-notification-bing';
                color ='bg-danger';
            }
            var dynamicAlert = '<div class="alert alert-dismissible '+color+' d-flex flex-column flex-sm-row p-5 mb-10">';
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
            $('.alert_message').html(dynamicAlert);
        }
    </script>
    @yield('js')

</body>

</html>
