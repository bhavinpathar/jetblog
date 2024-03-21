@if (session()->has('success'))
    <div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-5 mb-10">
        <i class="ki-duotone ki-notification-bing fs-2hx text-light me-4 mb-5 mb-sm-0"><span class="path1"></span><span
                class="path2"></span><span class="path3"></span></i>

        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
            <h4 class="mb-2 light">Success</h4>

            <span>{{ Session::get('success') }}</span>
        </div>

        <button type="button"
            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
            data-bs-dismiss="alert">
            <i class="ki-solid ki-cross fs-1 text-light"></i>
        </button>
    </div>
@endif
@if (session()->has('failed'))
    <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10">
        <i class="ki-duotone ki-notification-bing fs-2hx text-light me-4 mb-5 mb-sm-0"><span class="path1"></span><span
                class="path2"></span><span class="path3"></span></i>

        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
            <h4 class="mb-2 light">Error</h4>

            <span>{{ Session::get('failed') }}</span>
        </div>

        <button type="button"
            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
            data-bs-dismiss="alert">
            <i class="ki-solid ki-cross fs-1 text-light"></i>
        </button>
    </div>
@endif
