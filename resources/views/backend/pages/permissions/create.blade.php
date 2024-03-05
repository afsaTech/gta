@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Permissions
@endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="my-1 float-left"><i class="fas fa-info-circle text-blue"></i>&nbsp;{{ 'Add New Permission' }}</h3>
            @can('permissions.index')
                <div class="btn-group btn-group-sm float-right" role="group">
                    <a href="{{ route('permissions.index') }}" class="btn btn-outline-primary" title="List All">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>
                </div>
            @endcan
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <form action="{{ route('permissions.store') }}" method="post" class="form">
                @csrf
                @include(config('system.paths.backend.page') . 'permissions.form')
            </form>
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
    <script>
        $(document).ready(function() {
            var repeatableFields = $('.repeatable-fields');

            repeatableFields.on('click', '.add-field', function() {
                var field = $(this).closest('.form-row').clone();
                field.find('input').val('');

                if (!field.find('.remove-field').length) {
                    var removeButton = $(
                        '<button type="button" class="btn btn-danger btn-sm remove-field"><i class="fas fa-minus"></i></button>'
                        );
                    field.find('.col-md-2').append(removeButton);
                }

                $(this).closest('.form-row').after(field);
            });

            repeatableFields.on('click', '.remove-field', function() {
                $(this).closest('.form-row').remove();
            });
        });
    </script>
@endsection
