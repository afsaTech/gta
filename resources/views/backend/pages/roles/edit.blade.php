@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Role
@endsection

@section('css')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Whoops!</strong> There were some problems with your input.<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-white h3">&times;</span>
            </button>
        </div>
    @endif

    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="my-1 float-left"><i class="fas fa-info-circle text-info"></i>&nbsp;Update</h3>
            @can('roles.index')
                <div class="btn-group btn-group-sm float-right" role="group">
                    <a href="{{ route('roles.index') }}" class="btn btn-outline-info" title="List All">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>
                </div>
            @endcan
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <div class="col-md-12">
                <form action="{{ route('roles.update', $role->id) }}" method="post" class="form">
                    @method('patch')
                    @csrf
                    @include(config('system.paths.backend.page') . 'roles.form')
                </form>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if ($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', false);
                    });
                }

            });
        });
    </script>
@endsection
