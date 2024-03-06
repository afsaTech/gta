@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Packages
@endsection

@section('css')
    <!-- DataTables js-->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="my-1 float-left"> <i class="fas fa-info-circle blue"></i>&nbsp;All Packages</h3>
            @can('packages.create')
                <div class="btn-group btn-group-sm float-right" role="group">
                    <a href="{{ route('packages.create') }}" class="btn btn-outline-success" title="Add New">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                </div>
            @endcan
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">S/N</th>
                        <th>Name</th>
                        <th width="5%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $key => $package)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ ucfirst($package->title ) }}</td>
                            <td>
                                <div class="btn-group btn-group-sm float-right" role="group">
                                    <!-- @can('packages.edit') -->
                                    <a href="#">
                                        <button class="btn btn-default btn-sm" title="Publish">
                                            <i class=" fas fa-fw fa-upload text-success" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                     <!-- @endcan -->
                                    @can('package-images.index')
                                        <a href="{{ route('package-images.index') }}">
                                            <button class="btn btn-default btn-sm" title="Show" disabled>
                                                <i class=" fas fa-fw fa-image text-dark" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    @endcan
                                    @can('packages.show')
                                        <a href="{{ route('packages.show', $package->id) }}">
                                            <button class="btn btn-default btn-sm" title="Show">
                                                <i class=" fas fa-fw fa-eye text-info" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    @endcan
                                    @can('packages.edit')
                                        <a href="{{ route('packages.edit', $package->id) }}">
                                            @csrf
                                            <button class="btn btn-default btn-sm" title="Edit">
                                                <i class=" fas fa-fw fa-pencil-alt fa-sm text-primary" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    @endcan
                                    @can('packages.destroy')
                                        <!-- Modal for Confirmation -->
                                        <div class="modal fade" id="deleteModal{{ $package->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this post?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('packages.destroy', $package->id) }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button to trigger the modal -->
                                        <button class="btn btn-default btn-sm" title="Delete" data-toggle="modal"
                                            data-target="#deleteModal{{ $package->id }}">
                                            <i class="fas fa-fw fa-trash fa-sm text-danger" aria-hidden="true"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('js')
    <!-- DataTables -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $("#datatable").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
