<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GTA - Forget Password</title>
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/google_fonts.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card">
            <br>
            <div class="col-12" style="text-align: center">
                <span class="col-12 "
                    style=" text-align: center; background-color:white;font-size:17px;text-shadow:0.2px 0.2px 0.2px #4C4B4D;
            font-family: 'Seta Reta NF';
            font-weight: 600;
            color: #4C4B4D !important">
                    GTA
                </span>
            </div>
            <div class="card-header text-center">
                <img src="/images/lsdm-logo.png" alt="" style="width:70px;height:70px"> <br>
                <span class="col-12 "
                    style="text-align: center; background-color:white;font-size:17px;text-shadow:0.2px 0.2px 0.2px #4C4B4D;
            font-family: 'Seta Reta NF',serif;
            font-weight: bold;
            color: #4C4B4D !important">
                    GTA
                </span>
            </div>
            <div class="card-body">
                <p class="login-box-msg">
                    {{-- {{ if .infos }}
                    {{range $index, $value := .infos}} --}}
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{-- {{ $value }} --}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- {{end}}{{end}} --}}


                {{-- {{ if .errors }} {{range $index, $value := .errors}} --}}
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{-- {{ $value }} --}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- {{end}} {{end}} --}}
                </p>
                <form action="#" method="POST">
                    <input type="hidden" name="csrf" value="#">
                    {{-- {{ include "auth/views/auth/partials/_forgot_password_form" }} --}}
                    <div class="social-auth-links text-center mt-4">
                        <button class="btn btn-block" style="background-color:#ab8342 !important">
                            <i class=""></i> <span class="text-white">Request Password</span>
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <div class="footer">
        <hr>
        &copy; {{ copy }} GTA
    </div>

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>

</html>
