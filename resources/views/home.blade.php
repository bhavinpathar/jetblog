@extends('layouts.employeepanel.default')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">

                        <form form data-kt-search-element="form" class="w-100 position-relative mb-3" id="frm"
                            action="" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                            style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url(assets/media/avatars/300-1.jpg)"></div>
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
                                                <input type="file" name="profile" accept=".png, .jpg, .jpeg, .gif" />
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
                                        <!--begin::Hint-->
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                        @error('profile')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <input type="text" name="first_name"
                                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                    placeholder="First name" />
                                                @error('first_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <input type="text" name="last_name"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Last name" />
                                                @error('last_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">email</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="email"
                                            class="form-control form-control-lg form-control-solid" placeholder="email" />
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">password</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="password" name="password"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="password" />
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">Country</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>

                                    <div class="col-lg-8 fv-row">
                                        <select name="country" class="form-select form-select-solid"
                                            aria-label="Select a Country" data-control="select2">
                                            {{-- @dd($countries); --}}

                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">gender</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <!--begin::Options-->
                                        <div class="d-flex align-items-center mt-3">
                                            <!--begin::Option-->
                                            <label
                                                class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                <input class="form-check-input" name="gender" value="male"
                                                    type="radio" checked />
                                                <span class="fw-semibold ps-2 fs-6">Male</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label
                                                class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                <input class="form-check-input" name="gender" value="female"
                                                    type="radio" />
                                                <span class="fw-semibold ps-2 fs-6">Female</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        @error('gender')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Date Of Birth</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="date" name="dob"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Date Of Birth" />
                                        @error('dob')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">Contact Phone</span>
                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Phone number must be active">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="tel" name="phone"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Phone number" />
                                    </div>
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">hobbies</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <!--begin::Options-->
                                        <div class="d-flex align-items-center mt-3">
                                            <!--begin::Option-->
                                            <label
                                                class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                <input class="form-check-input" name="hobby[]" value="reading"
                                                    type="checkbox" />
                                                <span class="fw-semibold ps-2 fs-6">i like reading</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                <input class="form-check-input" name="hobby[]" value="traveling"
                                                    type="checkbox" />
                                                <span class="fw-semibold ps-2 fs-6">i like traveling</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                <input class="form-check-input" name="hobby[]" value="dance"
                                                    type="checkbox" />
                                                <span class="fw-semibold ps-2 fs-6">i like dance</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        @error('hobby')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">address</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="address"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="address" />
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset"
                                    class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                <button type="submit" value="submit" class="btn btn-primary"
                                    id="kt_account_profile_details_submit">Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


@section('js')
    <script>
        jQuery('#frm').validate({
            rules: {
                first_name: "required",

                last_name: "required",

                email: {
                    required: true,
                    email: true,
                },

                password: {
                    required: true,
                    maxlength: 15,
                },

                dob: {
                    required: true,
                },

                phone: {
                    required: true,
                    // minlength: 10,
                    maxlength: 10,
                },

                address: "required",

                profile: {
                    required: true,
                    accept: "jpg,jpeg,png,gif"
                },

                "hobby[]": "required",
            },

            errorElement: "div",
            messages: {
                    first_name: "please enter first name",
                    last_name: "please enter last name",
                    dob: "please enter date of birth",
                    phone: "please enter phn number",
                    address: "please enter address",
                    profile: "please select profile",
                    "hobby[]": "please fill hobbies",
                email: {
                    required: 'Please enter an email address. ',
                    // remote: 'This email is already taken. '
                },

            },
            submitHandler: function(form) {
                var hobbies = [];
                // $('[name="hobbies[]"]:checked').each(function(i) {
                //     hobbies[i] = $(this).val();
                // });
                $fd = new FormData(form);

                $.ajax({
                    url: '{{ route('users.create_user') }}',
                    type: 'POST',
                    data: $fd,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data.status);
                        if (data.status) {
                            window.location.href = '{{ route('users.list') }}';
                        } else {
                            console.log("not succses");
                        }
                    },
                    error: function(error) {
                        console.log(error.responseJSON);
                        $.each(error.responseJSON.errors, function(key, value) {
                            // Find the input field with the name attribute matching the key
                            var field = $('[name="' + key + '"]');
                            // Display the error message next to the input field
                            field.after('<div class="error">' + value +
                                '</div>');
                        });

                    }
                });
            },
            errorPlacement: function(label, element) {
                if (element.attr("name") === "hobbies[]") {
                    element.parent().append(
                        label
                    );
                } else {
                    label.insertAfter(element); // standard behaviour
                }
            },

        });
    </script>
@endsection
