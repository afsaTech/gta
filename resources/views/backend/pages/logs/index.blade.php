@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Logs
@endsection

@section('css')
    <!-- DataTables js-->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="my-1 float-left"> <i class="fas fa-info-circle blue"></i>&nbsp;All Logs</h3>
            @can('logs.filter')
                <div class="btn-group btn-group-sm float-right" role="group">
                    <a href="{{ route('logs.filter') }}" class="btn btn-outline-primary" title="Filter Log">
                        <i class="fas fa-fw fa-filter fa-sm" aria-hidden="true"></i>
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
                        <th>Action</th>
                        <th>Action By</th>
                        <th>Time</th>
                        <th width="5%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $key => $log)
                        @if($log->user_id != null)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ Str::ucfirst($log->table_name) . ' ' . Str::ucfirst(str_replace('_', ' ', $log->action)) }}
                            </td>
                            <td>{{ $log->user->name ?? 'N/A' }}</td>
                            <td>{{ $log->formatted_date }}</td>
                            <td>
                                <div class="btn-group btn-group-sm float-right" role="group">
                                    @can('logs.show')
                                        <a href="{{ route('logs.show', $log->id) }}">
                                            <button class="btn btn-default btn-sm" title="Show">
                                                <i class=" fas fa-fw fa-eye text-info" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    @endcan
                                    @can('logs.destroy')
                                        <!-- Modal for Confirmation -->
                                        <div class="modal fade" id="deleteModal{{ $log->id }}" tabindex="-1"
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
                                                        Are you sure you want to delete this log?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('logs.destroy', $log->id) }}" method="post">
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
                                            data-target="#deleteModal{{ $log->id }}">
                                            <i class="fas fa-fw fa-trash fa-sm text-danger" aria-hidden="true"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
