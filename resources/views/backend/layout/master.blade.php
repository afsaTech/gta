<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GTA @yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- CSS toastr alert -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <style>
        .icon-color {
            color: #C1892D;
            ;
        }

        .button-color {
            background-color: #C1892D;
            ;
        }

        .active {
            background-color: #C1892D;
        }

        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 38px !important;
            padding-left: 0px;
            border-color: rgb(207, 204, 204);
        }

        .select2-selection__arrow {
            height: 34px !important;
        }

        .select2 {
            width: 100% !important;
        }

        #unread-notifications {
            height: 300px;
            overflow-y: auto;

            /* CSS for the scrollbar */
            scrollbar-width: 0.25rem;
            scrollbar-color: #ccc #f1f1f1;
        }

        #unread-notifications::-webkit-scrollbar {
            width: 0.25rem;
            height: 0.25rem;
            background-color: #eee;
        }

        #unread-notifications::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 2px;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
        }

        #unread-notifications-count {
            font-size: 0.6rem;
            padding: 0.1rem 0.3rem;
        }

        .nav-item.settings {
            margin-top: 20px;
        }

        .nav-item.logout {
            position: fixed;
            bottom: 0;
            left: 0;
            padding: 1rem;
            z-index: 1;
        }
    </style>

    @yield('css')
    @include('backend.layout.partials._preload')
</head>

<body class="hold-transition sidebar-mini layout-footer-fixed layout-navbar-fixed">

    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm">
            @include(config('system.paths.backend.layout_partials') . '_navbar')
        </nav>

        <div id="leftsidebar">
            @include(config('system.paths.backend.layout_partials') . '_leftsidebar')
        </div>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @include(config('system.paths.backend.layout_partials') . '_breadcrumb')
                </div>
            </div>

            <div class="content" style="margin-top: -2rem;">
                <div class="container-fluid">
                    <div class="box-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            @include(config('system.paths.backend.layout_partials') . '_rightsidebar')
        </aside>

        <footer class="main-footer text-sm">
            @include(config('system.paths.backend.layout_partials') . '_footer')
        </footer>

    </div>
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- JS and logic for toastr alert -->
    <script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
    @include(config('system.paths.backend.layout_partials') . '_toastr_message')

    <script>
        $(function() {
            $.ajax({
                url: '{{ route('notifications.get-unread') }}',
                method: 'GET',
                success: function(response) {
                    $('#unread-notifications-count').text(response.length);

                    var html = '';

                    for (var i = 0; i < response.length; i++) {
                        html += '<a href="' + '/notifications/show/' + response[i].id +
                            '" class="dropdown-item notification" data-notification-id="' + response[i]
                            .id + '">' +
                            '<span class="float-right close-notification"><i class="fas fa-xs fa-times" style="opacity: 0.5;"></i></span>' +
                            response[i].message +
                            '</a>';
                    }

                    $('#unread-notifications').html(html);

                    // Add a scrollbar to the dropdown menu
                    $('#unread-notifications').css('overflow-y', 'scroll');

                    // Add an event listener to the notification links
                    $('.notification').on('click', function(e) {
                        e.preventDefault();

                        // Get the notification ID
                        var notificationId = $(this).data('notification-id');

                        // Redirect the user to the notification details page
                        window.location.href = '/notifications/show/' + notificationId;

                        // Update the read_at column in the notification table
                        $.ajax({
                            url: '/notifications/mark-as-read/' + notificationId,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(response) {
                                // Update the unread notification count
                                $('#unread-notifications-count').text(response
                                    .unread_count);

                                // Hide the notification from the dropdown menu
                                $('.notification[data-notification-id="' +
                                    notificationId + '"]').remove();
                            }
                        });
                    });

                    // Add an event listener to the close-notification buttons
                    $('.close-notification').click(function(e) {
                        e.preventDefault();

                        // Get the notification ID
                        var notificationId = $(this).closest('.notification').data(
                            'notification-id');

                        // Update the read_at column in the notification table
                        $.ajax({
                            url: '/notifications/mark-as-read/' + notificationId,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(response) {
                                $('#unread-notifications-count').text(response
                                    .unread_count);
                                $('.notification[data-notification-id="' +
                                    notificationId + '"]').remove();
                            }
                        });

                        // Stop the event from propagating to the parent element
                        e.stopPropagation();
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Get the current state of the pushmenu
            var pushMenuState = localStorage.getItem('pushMenuState');

            // If the pushmenu is currently open, keep it open
            if (pushMenuState === 'open') {
                $('body').addClass('sidebar-collapse');
            }

            // Add a listener to the pushmenu button
            $('[data-widget="pushmenu"]').on('click', function() {
                // Get the new state of the pushmenu
                var newPushMenuState = $('body').hasClass('sidebar-collapse') ? 'closed' : 'open';

                // Save the new state of the pushmenu to local storage
                localStorage.setItem('pushMenuState', newPushMenuState);
            });
        });
    </script>
    @yield('js')
</body>

</html>
