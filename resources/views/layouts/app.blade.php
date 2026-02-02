<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="kntx-url" content="{{ getWebURL() }}">
        <meta name="kntx-visitor" content="{{ !empty($current_user) ? $current_user['id'] : null }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="kntx-ref" content="{{ !empty($current_user) ? $current_user['api_token'] : null }}">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">

        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('assets/addons/staradmin/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/staradmin/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/staradmin/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/staradmin/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/staradmin/typicons/typicons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/staradmin/simple-line-icons/css/simple-line-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/staradmin/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/staradmin/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/jquery/jquery-ui/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/jquery/datetimepicker/css/jquery.datetimepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/cropper/css/cropper.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/addons/custom/sweetalert2/dist/sweetalert2.min.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('assets/addons/staradmin/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select.dataTables.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <!-- Custom style -->
        <style>
            /* .boxed-layout .container-scroller { background: #777!important; } */
        </style>

        <title>
@if (!empty($page_title))
            {{ 'KinTaxi / ' . $page_title }}
@else
            {{ config('app.name') }}
@endif
        </title>
    </head>

    <body>
        <!-- START MODALS -->
@include('layouts.modals')
        <!-- END MODALS -->

        <div class="container-scroller">
            <!-- partial:../../partials/_navbar.html -->
            <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                    <div class="me-3">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                            <span class="icon-menu"></span>
                        </button>
                    </div>

                    <div>
                        <a class="navbar-brand brand-logo" href="{{ route('home') }}">
                            <img src="{{ asset('assets/img/logo-text.png') }}" alt="logo" />
                        </a>
                        <a class="navbar-brand brand-logo-mini" href="{{ route('home') }}">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="logo" />
                        </a>
                    </div>
                </div>

                <div class="navbar-menu-wrapper d-flex align-items-top">
                    <ul class="navbar-nav">
                        <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                            <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1>
                            <h3 class="welcome-sub-text">Your performance summary this week </h3>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item d-none d-lg-block">
                            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                                <span class="input-group-addon input-group-prepend border-right">
                                    <span class="icon-calendar input-group-text calendar-icon"></span>
                                </span>

                                <input type="text" class="form-control">
                            </div>
                        </li>

                        <li class="nav-item">
                            <form class="search-form" action="#">
                                <i class="icon-search"></i>
                                <input type="search" class="form-control" placeholder="@lang('miscellaneous.search')" title="@lang('miscellaneous.search_input')">
                            </form>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                                <i class="icon-bell"></i>
                                <span class="count"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                                <a class="dropdown-item py-3 border-bottom">
                                    <p class="mb-0 fw-medium float-start">You have 4 new notifications </p>
                                    <span class="badge badge-pill badge-primary float-end">View all</span>
                                </a>

                                <a class="dropdown-item preview-item py-3">
                                    <div class="preview-thumbnail">
                                        <i class="mdi mdi-alert m-auto text-primary"></i>
                                    </div>

                                    <div class="preview-item-content">
                                        <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                                        <p class="fw-light small-text mb-0"> Just now </p>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item py-3">
                                    <div class="preview-thumbnail">
                                        <i class="mdi mdi-lock-outline m-auto text-primary"></i>
                                    </div>

                                    <div class="preview-item-content">
                                        <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                                        <p class="fw-light small-text mb-0"> Private message </p>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item py-3">
                                    <div class="preview-thumbnail">
                                        <i class="mdi mdi-airballoon m-auto text-primary"></i>
                                    </div>

                                    <div class="preview-item-content">
                                        <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                                        <p class="fw-light small-text mb-0"> 2 days ago </p>
                                    </div>
                                </a>
                            </div>
                        </li>
{{-- 
                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="icon-mail icon-lg"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                                <a class="dropdown-item py-3">
                                    <p class="mb-0 fw-medium float-start">You have 7 unread mails </p>
                                    <span class="badge badge-pill badge-primary float-end">View all</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="../../assets/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                                    </div>

                                    <div class="preview-item-content flex-grow py-2">
                                        <p class="preview-subject ellipsis fw-medium text-dark">Marian Garner </p>
                                        <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="../../assets/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                                    </div>

                                    <div class="preview-item-content flex-grow py-2">
                                        <p class="preview-subject ellipsis fw-medium text-dark">David Grey </p>
                                        <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="../../assets/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                                    </div>

                                    <div class="preview-item-content flex-grow py-2">
                                        <p class="preview-subject ellipsis fw-medium text-dark">Travis Jenkins </p>
                                        <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                    </div>
                                </a>
                            </div>
                        </li> --}}

                        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-xs rounded-circle" src="{{ $current_user['avatar_url'] }}" alt="Profile image">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                <div class="dropdown-header text-center">
                                    <img class="img-md rounded-circle" src="{{ $current_user['avatar_url'] }}" alt="Profile image" style="width: 50px;">

                                    <p class="mb-1 mt-3 fw-semibold">{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}</p>
                                    <p class="fw-light text-muted mb-0">{{ $current_user['username'] ?? $current_user['email'] }}</p>
                                </div>

                                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> @lang('miscellaneous.menu.account.title')</a>
                                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                            </div>
                        </li>
                    </ul>

                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->

            <div class="container-fluid page-body-wrapper">
                <!-- partial:../../partials/_sidebar.html -->
@include('layouts.navigation')
                <!-- partial -->

                <div class="main-panel">
                    <div class="content-wrapper">
@yield('app-content')
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
                            <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All rights reserved.</span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>

        <!-- Button back to top -->
        <button id="btnBackTop" class="btn btn-lg btn-floating btn-warning position-fixed d-none rounded-circle shadow" title="@lang('miscellaneous.back_top')" style="z-index: 9999; bottom: 2rem; right: 2rem; padding: 0.4rem 0.5rem;" onclick="backToTop()" data-bs-toggle="tooltip"><i class="bi bi-chevron-double-up"></i></button> 

        <!-- JavaScript Libraries -->
        <script src="{{ asset('assets/addons/custom/autosize/js/autosize.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/dataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/cropper/js/cropper.min.js') }}"></script>
        <script src="{{ asset('assets/addons/custom/sweetalert2/dist/sweetalert2.min.js') }}"></script>
        <!-- plugins:js -->
        <script src="{{ asset('assets/addons/staradmin/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('assets/addons/staradmin/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('assets/addons/staradmin/chart.js/chart.umd.js') }}"></script>
        <script src="{{ asset('assets/addons/staradmin/progressbar.js/progressbar.min.js') }}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
        <script src="{{ asset('assets/js/template.js') }}"></script>
        <script src="{{ asset('assets/js/settings.js') }}"></script>
        <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('assets/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/dashboard.js') }}"></script>
        <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->

        <!-- Custom Javascript -->
        <script src="{{ asset('assets/js/script.custom.js') }}"></script>
        <script type="text/javascript">
            /*
             * When the user clicks on the button, scroll to the top of the document
             */
            function backToTop() {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }
        </script>
@if (Route::is('customer.home'))
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCDLqp2YpT47nBISIE0S--ay2oJ6401IVk"></script>
        <script type="text/javascript">
            $(function () {
                /*
                 * Rides on Google Maps
                 */
                let map;
                let markers = [];

                const initMap = () => {
                    const rides = window.Laravel.data.rides_completed;
                    const latLng = (rides.length > 0)
                                    ? new google.maps.LatLng(rides[0].start_location.location.lat, rides[0].start_location.location.lng)
                                    : new google.maps.LatLng(-1.6586834, 29.1669084);

                    map = new google.maps.Map(document.getElementById('gmap'), {
                        zoom: 12,
                        center: latLng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });

                    updateMap('rides_completed'); // The default status
                };

                const updateMap = (rideStatus) => {
                    markers.forEach(function(marker) {
                        marker.setMap(null);
                    });
                    markers = [];

                    var rides = window.Laravel.data[rideStatus];
                    console.log(rides);

                    if (rides.length > 0) {
                        var latLng = new google.maps.LatLng(rides[0].start_location.location.lat, rides[0].start_location.location.lng);

                        map.setCenter(latLng);
                    }

                    rides.forEach(function(ride) {
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(ride.start_location.location.lat, ride.start_location.location.lng),
                            map: map,
                            draggable: false,
                            animation: google.maps.Animation.DROP,
                        });

                        markers.push(marker);
                    });
                };

                $('#rideStatus').change(function() {
                    var status = $(this).val();

                    updateMap(status);
                });

                initMap();

                // $('#rideStatus').change(function (e) { 
                //     e.preventDefault();

                //     if ($('#rideStatus').val() === 'ride_in_progress') {
                        
                //     }
                // });
                // var latLng = new google.maps.LatLng(-1.6586834, 29.1669084);
                // var map = new google.maps.Map(document.getElementById('gmap'), {
                //     zoom: 12,
                //     center: latLng,
                //     mapTypeId: google.maps.MapTypeId.ROADMAP,
                // });

                // window.Laravel.data.rides_completed.forEach((item, index) => {
                //     console.log(JSON.stringify(item.start_location));
                //     var marker = new google.maps.Marker({
                //         position: new google.maps.LatLng(item.start_location.location.lat, item.start_location.location.lng),
                //         map: map,
                //         draggable: false,
                //         animation: google.maps.Animation.DROP,
                //     });

                //     marker.idEvent = item.id;
                // });
            });
        </script>
@endif
@if (Route::is('vehicle.show'))
        <script type="text/javascript">
            /*
             * Image preview from input:file multiple
             */
            let selectedFiles = []; // Table to maintain the list of selected files

            document.getElementById('imageInput').addEventListener('change', function(event) {
                const newFiles = event.target.files;
                const previewContainer = document.getElementById('imagePreviewContainer');

                // Add new files to the existing list (without deleting old ones)
                selectedFiles = [...selectedFiles, ...Array.from(newFiles)];

                // Show previews for all files (old and new)
                previewContainer.innerHTML = ''; // Clear existing previews to update the list

                previewContainer.classList.remove('d-none');

                selectedFiles.forEach((file, index) => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const imagePreview = document.createElement('div');

                        imagePreview.classList.add('imagePreview');
            
                        const img = document.createElement('img');

                        img.src = e.target.result;

                        const removeBtn = document.createElement('button');

                        removeBtn.classList.add('remove-btn');

                        removeBtn.innerHTML = '<i class="bi bi-x-lg"></i>';

                        removeBtn.addEventListener('click', () => {
                            // Delete the file from the table and update the entry
                            selectedFiles.splice(index, 1); // Remove file from table
                            imagePreview.remove(); // Remove DOM preview
                            updateInput(); // Update the input with the new list of files

                            // If the file list is empty, reset the input
                            if (selectedFiles.length === 0 || !previewContainer.hasChildNodes()) {
                                document.getElementById('imageInput').value = ''; // Reset the input

                                previewContainer.classList.add('d-none');
                            }
                        });

                        imagePreview.appendChild(img);
                        imagePreview.appendChild(removeBtn);
                        previewContainer.appendChild(imagePreview);
                    };
                    reader.readAsDataURL(file);
                });

                updateInput(); // Update the entry to reflect the list of files
            });
        </script>
@endif
        <script type="text/javascript">
            /*
             * When the user clicks on the button, scroll to the top of the document
             */
            const backToTop = () => {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            };

            /**
             * Change user role
             */
            const changeRole = (element) => {
                const _this = document.getElementById(element.id);
                const element_value = parseInt(_this.value);
                const user_id = parseInt(_this.getAttribute('data-user-id'));

                Swal.fire({
                    title: '{{ __("miscellaneous.alert.attention.role") }}',
                    text: '{{ __("miscellaneous.alert.confirm.role") }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __("miscellaneous.alert.yes.role") }}',
                    cancelButtonText: '{{ __("miscellaneous.cancel") }}'

                }).then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            headers: headers,
                            type: 'POST',
                            contentType: 'application/json',
                            url: '/role/users/' + user_id,
                            dataType: 'json',
                            data: JSON.stringify({ _token : csrfToken, 'id' : user_id, 'role_id' : element_value }),
                            success: function (result) {
                                if (!result.success) {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.oups") }}',
                                        text: result.message,
                                        icon: 'error'
                                    });

                                } else {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.perfect") }}',
                                        text: result.message,
                                        icon: 'success'
                                    });
                                    location.reload();
                                }
                            },
                            error: function (xhr, error, status_description) {
                                console.log(xhr.responseJSON);
                                console.log(xhr.status);
                                console.log(error);
                                console.log(status_description);

                                Swal.fire({
                                    title: '{{ __("notifications.500_title") }}',
                                    text: xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : (xhr.responseText && xhr.responseText.message ? xhr.responseText.message : status_description),
                                    icon: 'error'
                                });
                            }
                        });

                    } else {
                        Swal.fire({
                            title: '{{ __("miscellaneous.cancel") }}',
                            text: '{{ __("miscellaneous.alert.canceled.role") }}',
                            icon: 'error'
                        });
                    }
                });
            };

            /**
             * Change pricing unit
             */
            const changeUnit = (element) => {
                const _this = document.getElementById(element.id);
                const element_value = _this.value;
                const pricing_id = parseInt(_this.getAttribute('data-pricing-id'));

                Swal.fire({
                    title: '{{ __("miscellaneous.alert.attention.unit") }}',
                    text: '{{ __("miscellaneous.alert.confirm.unit") }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __("miscellaneous.alert.yes.unit") }}',
                    cancelButtonText: '{{ __("miscellaneous.cancel") }}'

                }).then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            headers: headers,
                            type: 'POST',
                            contentType: 'application/json',
                            url: '/pricing/' + pricing_id,
                            dataType: 'json',
                            data: JSON.stringify({ _token : csrfToken, 'id' : pricing_id, 'unit' : element_value }),
                            success: function (result) {
                                if (!result.success) {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.oups") }}',
                                        text: result.message,
                                        icon: 'error'
                                    });

                                } else {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.perfect") }}',
                                        text: result.message,
                                        icon: 'success'
                                    });
                                    location.reload();
                                }
                            },
                            error: function (xhr, error, status_description) {
                                console.log(xhr.responseJSON);
                                console.log(xhr.status);
                                console.log(error);
                                console.log(status_description);

                                Swal.fire({
                                    title: '{{ __("notifications.500_title") }}',
                                    text: xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : (xhr.responseText && xhr.responseText.message ? xhr.responseText.message : status_description),
                                    icon: 'error'
                                });
                            }
                        });

                    } else {
                        Swal.fire({
                            title: '{{ __("miscellaneous.cancel") }}',
                            text: '{{ __("miscellaneous.alert.canceled.unit") }}',
                            icon: 'error'
                        });
                    }
                });
            };

            /**
             * Change status of an entity
             */
            const changeStatus = (entity, element) => {
                const _this = document.getElementById(element.id);
                const status_id = parseInt(_this.dataset.statusId);
                const object_id = parseInt(_this.dataset.objectId);
                // Routes object
                const routes = {
                    vehicle: '/vehicle/{id}',
                    category: '/vehicle/category/{id}',
                    gateway: '/payment-gateway/{id}',
                    pricing: '/pricing/{id}',
                };

                if (isNaN(status_id) || status_id === '' || typeof status_id !== 'number') {
                    Swal.fire({
                        title: '{{ __("miscellaneous.alert.oups") }}',
                        text: '{{ __("validation.numeric", ["attribute" => "status_id"]) }}',
                        icon: 'error'
                    });

                    return;
                }

                if (isNaN(object_id) || object_id === '' || typeof object_id !== 'number') {
                    Swal.fire({
                        title: '{{ __("miscellaneous.alert.oups") }}',
                        text: '{{ __("validation.numeric", ["attribute" => "object_id"]) }}',
                        icon: 'error'
                    });

                    return;
                }

                Swal.fire({
                    title: '{{ __("miscellaneous.alert.attention.status") }}',
                    text: '{{ __("miscellaneous.alert.confirm.status") }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __("miscellaneous.alert.yes.status") }}',
                    cancelButtonText: '{{ __("miscellaneous.cancel") }}'

                }).then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            headers: headers,
                            type: 'POST',
                            contentType: 'application/json',
                            url: currentHost + routes[entity].replace('{id}', object_id),
                            dataType: 'json',
                            data: entity === 'pricing' ? JSON.stringify({ _token : csrfToken, 'id' : object_id, 'is_default' : (status_id == 0 ? -5 : status_id) }) : JSON.stringify({ _token : csrfToken, 'id' : object_id, 'status_id' : (status_id == 0 ? -5 : status_id) }),
                            success: function (result) {
                                console.log(result);

                                if (!result.success) {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.oups") }}',
                                        text: result.message,
                                        icon: 'error'
                                    });

                                } else {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.perfect") }}',
                                        text: result.message,
                                        icon: 'success'
                                    });
                                    location.reload();
                                }
                            },
                            error: function (xhr, error, status_description) {
                                console.log(xhr.responseJSON);
                                console.log(xhr.status);
                                console.log(error);
                                console.log(status_description);

                                Swal.fire({
                                    title: '{{ __("notifications.500_title") }}',
                                    text: xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : (xhr.responseText && xhr.responseText.message ? xhr.responseText.message : status_description),
                                    icon: 'error'
                                });
                            }
                        });

                    } else {
                        Swal.fire({
                            title: '{{ __("miscellaneous.cancel") }}',
                            text: '{{ __("miscellaneous.alert.canceled.status") }}',
                            icon: 'error'
                        });
                    }
                });
            };

            /**
             * Delete entity
             * 
             * @param string entity
             * @param int entityId
             * @param string|null additionalEntity
             * 
             * SOME EXAMPLES
             * ==================
             * To delete a customer with ID "123" : deleteEntity('customer', 123);
             * To delete a vehicle with ID "456" and entity "car" : deleteEntity('vehicle', 456, 'car');
             * To delete a role with ID "789" and the entity "admin" : deleteEntity('role', 789, 'admin');
             */
            const deleteEntity = (entity, entityId, additionalEntity = null) => {
                // Routes object
                const routes = {
                    customer: '/customer/delete/{id}',
                    currency: '/currency/delete/{id}',
                    pricing: '/pricing/delete/{id}',
                    'payment-gateway': '/payment-gateway/delete/{id}',
                    vehicle: '/vehicle/delete/{id}',
                    'vehicle-entity': '/vehicle/delete/{entity}/{id}',
                    role: '/role/delete/{id}',
                    'role-entity': '/role/delete/{entity}/{id}',
                    status: '/status/delete/{id}'
                };

                // Checking for the existence of the entity in the object
                if (!routes[entity] && !routes[`${entity}-entity`]) {
                    Swal.fire({
                        title: '{{ __("miscellaneous.alert.oups") }}',
                        text: '{{ __("validation.custom.owner.required") }}',
                        icon: 'error'
                    });

                    return;
                }

                // URL construction based on the entity
                let url;

                if (routes[`${entity}-entity`] && additionalEntity) {
                    url = routes[`${entity}-entity`].replace('{entity}', additionalEntity).replace('{id}', entityId);

                } else {
                    url = routes[entity].replace('{id}', entityId);
                }

                // Confirmation request with SweetAlert
                Swal.fire({
                    title: '{{ __("miscellaneous.alert.attention.delete") }}',
                    text: '{{ __("miscellaneous.alert.confirm.delete") }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __("miscellaneous.alert.yes.delete") }}',
                    cancelButtonText: '{{ __("miscellaneous.cancel") }}'
                }).then(function (result) {
                    if (result.isConfirmed) {
                        // Ajax request
                        $.ajax({
                            headers: headers, // Headers are set in the "assets/js/script.custom.js"
                            type: 'GET',
                            url: url,
                            contentType: 'application/json',
                            // contentType: false,
                            // processData: false,
                            data: JSON.stringify({ 'entity': entity, 'id': entityId }),
                            success: function (result) {
                                if (!result.success) {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.oups") }}',
                                        text: result.message,
                                        icon: 'error'
                                    });

                                } else {
                                    Swal.fire({
                                        title: '{{ __("miscellaneous.alert.perfect") }}',
                                        text: result.message,
                                        icon: 'success'
                                    });
                                    location.reload();
                                }
                            },
                            error: function (xhr, error, status_description) {
                                console.log(xhr.responseJSON);
                                console.log(xhr.status);
                                console.log(error);
                                console.log(status_description);

                                Swal.fire({
                                    title: '{{ __("notifications.500_title") }}',
                                    text: xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : (xhr.responseText && xhr.responseText.message ? xhr.responseText.message : status_description),
                                    icon: 'error'
                                });
                            }
                        });

                    } else {
                        Swal.fire({
                            title: '{{ __("miscellaneous.cancel") }}',
                            text: '{{ __("miscellaneous.alert.canceled.delete") }}',
                            icon: 'error'
                        });
                    }
                });
            };

            /**
             * Function to update the input with the list of selected files
             */
            const updateInput = () => {
                const dataTransfer = new DataTransfer();

                selectedFiles.forEach(file => {
                    dataTransfer.items.add(file);
                });

                document.getElementById('imageInput').files = dataTransfer.files;
            };

            /**
             * Function to show rides by status
             * 
             * @param string titleSelector
             * @param string textSelector
             * @param string status
             * @param string textSingular
             * @param string textPlural
             */
            const countRidesByStatus = (titleSelector, textSelector, status, textSingular, textPlural) => {
                const titleElement = document.querySelector(titleSelector);
                const textElement = document.querySelector(textSelector);

                $.ajax({
                    headers: headers,
                    type: 'GET',
                    url: `${currentHost}/api/ride/rides_by_status/${status}`,
                    dataType: 'json',
                    success: function (response) {
                        const text = response.count > 1 ? textPlural : textSingular;

                        $(titleElement).html(response.count);
                        $(textElement).html(text);
                    },
                    error: function (xhr, error, status_description) {
                        console.log(xhr.responseJSON);
                        console.log(xhr.status);
                        console.log(error);
                        console.log(status_description);
                    }
                });
            };

            $(function () {
                /*
                 * Rides count
                 */
                // Periodic reminder (every second) with setInterval for each status
                countRidesByStatus('#inProgressRides h2', '#inProgressRides span', 'in_progress', window.Laravel.lang.menu.customers.ride_in_progress, window.Laravel.lang.menu.customers.rides_in_progress);
                countRidesByStatus('#completedRides h2', '#completedRides span', 'completed', window.Laravel.lang.menu.customers.ride_finished, window.Laravel.lang.menu.customers.rides_finished);
                countRidesByStatus('#requestedRides h2', '#requestedRides span', 'requested', window.Laravel.lang.menu.customers.rented_vehicle, window.Laravel.lang.menu.customers.rented_vehicles);

                setInterval(function() {
                    countRidesByStatus('#inProgressRides h2', '#inProgressRides span', 'in_progress', window.Laravel.lang.menu.customers.ride_in_progress, window.Laravel.lang.menu.customers.rides_in_progress);
                }, 10000);
                setInterval(function() {
                    countRidesByStatus('#completedRides h2', '#completedRides span', 'completed', window.Laravel.lang.menu.customers.ride_finished, window.Laravel.lang.menu.customers.rides_finished);
                }, 10000);
                setInterval(function() {
                    countRidesByStatus('#requestedRides h2', '#requestedRides span', 'requested', window.Laravel.lang.menu.customers.rented_vehicle, window.Laravel.lang.menu.customers.rented_vehicles);
                }, 10000);

                /*
                 * File type validation (Image only)
                 */
                $('#id_card, #driving_license, #vehicle_registration, #vehicle_insurance').on('change', function (event) {
                    var files = event.target.files;
                    var validExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
                    var validFiles = Array.from(files).filter(function (file) {
                        var extension = file.name.split('.').pop().toLowerCase(); // Retrieves the file extension

                        return validExtensions.includes(extension); // Check if the extension is valid
                    });

                    if (validFiles.length === 0) {
                        $('#errorMessageWrapper').removeClass('d-none');
                        $('#errorMessageWrapper .custom-message').html(window.Laravel.lang.upload.image_error);

                        // Clear the input field (remove the invalid file)
                        $(event.target).val('');

                        return;

                    } else {
                        if (!$('#errorMessageWrapper').hasClass('d-none')) {
                            $('#errorMessageWrapper').addClass('d-none');
                        }
                    }
                });

                /*
                 * Focus to specific input for each concerned modal
                 */
                $('#statusModal').on('shown.bs.modal', function () {
                    $('#status_name').focus();
                });
                $('#roleModal').on('shown.bs.modal', function () {
                    $('#role_name').focus();
                });
                $('#gatewayModal').on('shown.bs.modal', function () {
                    $('#gateway_name').focus();
                });
                $('#currencyModal').on('shown.bs.modal', function () {
                    $('#currency_name').focus();
                });
                $('#userModal').on('shown.bs.modal', function () {
                    $('#firstname').focus();

                    // Show / Hide "belongs_to" input according to selected role
                    $('#role').change(function (e) { 
                        e.preventDefault();

                        if ($(this).val() === '4') {
                            $('#belongs_to_wrapper').removeClass('d-none');

                        } else {
                            $('#belongs_to_wrapper').addClass('d-none');
                        }
                    });

                    // Send user data
                    $('#userModal form').submit(function (e) { 
                        e.preventDefault();

                        var formData = new FormData(this);

                        $.ajaxSetup({
                            headers: { 'X-CSRF-TOKEN': csrfToken }
                        });
                        $.ajax({
                            type: 'POST',
                            url: currentHost + '/role/users',
                            data: formData,
                            beforeSend: function () {
                                $('#userModal form button').addClass('disabled');
                                $('#userModal form button .spinner-border').removeClass('opacity-0');
                            },
                            complete: function () {
                                $('#userModal form button').removeClass('disabled');
                                $('#userModal form button .spinner-border').addClass('opacity-0');
                            },
                            success: function (res) {
                                if (!$('#errorMessageWrapper').hasClass('d-none')) {
                                    $('#errorMessageWrapper').addClass('d-none');
                                }

                                $('#successMessageWrapper').removeClass('d-none');
                                $('#successMessageWrapper .custom-message').html(res.message);

                                window.location.href = window.location.href;
                            },
                            cache: false,
                            contentType: false,
                            processData: false,
                            error: function (xhr, error, status_description) {
                                $('#userModal form button').removeClass('disabled');
                                $('#userModal form button .spinner-border').addClass('opacity-0');

                                if (!$('#successMessageWrapper').hasClass('d-none')) {
                                    $('#successMessageWrapper').addClass('d-none');
                                }

                                $('#errorMessageWrapper').removeClass('d-none');
                                $('#errorMessageWrapper .custom-message').html(xhr.responseJSON.message);

                                console.log(xhr.responseJSON);
                                console.log(xhr.status);
                                console.log(error);
                                console.log(status_description);
                            }
                        });
                    });
                });
                $('#vehicleModal').on('shown.bs.modal', function () {
                    $('#mark').focus();
                });
            });

            /*
             * Enlarge content (image) in the modal
             */
            document.querySelectorAll('.enlarge-content').forEach(function(image) {
                image.addEventListener('click', function() {
                    var dataTitle = image.getAttribute('data-title');
                    var dataSrc = image.getAttribute('data-src');

                    document.querySelector('#enlargeContent .modal-header .modal-title').innerHTML = dataTitle;
                    document.querySelector('#enlargeContent .modal-body img').setAttribute('src', dataSrc);
                    document.querySelector('#enlargeContent .modal-body img').setAttribute('alt', dataTitle);

                    var modal = new bootstrap.Modal(document.getElementById('enlargeContent'));

                    modal.show();
                });
            });

            /*
             * Injected data from Laravel
             */
            window.Laravel = {
                lang: {
                    menu: {
                        customers: {
                            title: "@lang('miscellaneous.menu.customers.title')",
                            ride_in_progress: "@lang('miscellaneous.menu.customers.ride-in-progress')",
                            rides_in_progress: "@lang('miscellaneous.menu.customers.rides-in-progress')",
                            ride_finished: "@lang('miscellaneous.menu.customers.ride-finished')",
                            rides_finished: "@lang('miscellaneous.menu.customers.rides-finished')",
                            rented_vehicle: "@lang('miscellaneous.menu.customers.rented-vehicle')",
                            rented_vehicles: "@lang('miscellaneous.menu.customers.rented-vehicles')",
                        },
                    },
                    upload: {
                        use_camera: "@lang('miscellaneous.upload.use_camera')",
                        upload_file: "@lang('miscellaneous.upload.upload_file')",
                        choose_existing_file: "@lang('miscellaneous.upload.choose_existing_file')",
                        image_error: "@lang('miscellaneous.upload.image_error')",
                        document_error: "@lang('miscellaneous.upload.document_error')",
                    },
                },
                data: {
                    rides_requested: @json($rides_requested),
                    rides_in_progress: @json($rides_in_progress),
                    rides_completed: @json($rides_completed),
                }
            }
        </script>
    </body>
</html>
