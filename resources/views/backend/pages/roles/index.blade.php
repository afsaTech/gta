@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Roles
@endsection

@section('css')
    <!-- DataTables js-->
    <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
    <!-- content to be displayed here -->
    <div class="card">
        <div class="card-header">
            <h3 class="my-1 float-left"> <i class="fas fa-info-circle blue"></i>&nbsp;All Roles</h3>
            @can('roles.create')
                <div class="btn-group btn-group-sm float-right" role="group">
                    <a href="{{ route('roles.create') }}" class="btn btn-outline-success" title="Add New">
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
                        <th width="5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div class="btn-group btn-group-sm float-right" role="group">
                                    @can('roles.show')
                                        <a href="{{ route('roles.show', $role->id) }}">
                                            <button class="btn btn-default btn-sm" title="Show">
                                                <i class=" fas fa-fw fa-eye text-info" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    @endcan
                                    @can('roles.edit')
                                        <a href="{{ route('roles.edit', $role->id) }}">
                                            @csrf
                                            <button class="btn btn-default btn-sm" title="Edit">
                                                <i class=" fas fa-fw fa-pencil-alt fa-sm text-primary" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    @endcan
                                    @can('roles.destroy')
                                        <!-- Modal for Confirmation -->
                                        <div class="modal fade" id="deleteModal{{ $role->id }}" tabindex="-1"
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
                                                        Are you sure you want to delete this role?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
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
                                            data-target="#deleteModal{{ $role->id }}">
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
