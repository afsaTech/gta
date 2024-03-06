@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Log
@endsection

@section('css')
    <style>
        .scrollable-list {
            max-height: 200px;
            /* Set a maximum height for the list */
            overflow-y: auto;
            /* Enable vertical scrolling */
            border: 1px solid #ccc;
            /* Add a border for visual clarity */
            padding: 10px;
            /* Add some padding for spacing */
        }

        .role {
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="my-1 float-left">Log Details</h3>
            @can('logs.index')
                <div class="btn-group btn-group-sm float-right" role="group">
                    <a href="{{ route('logs.index') }}" class="btn btn-outline-primary" title="Logs All">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>
                </div>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered">
                    <tr>
                        <th style="width: 15%">Action</th>
                        <td>{{ Str::ucfirst(str_replace('_', ' ', $log->action)) }}</td>
                    </tr>
                    <tr>
                        <th style="width: 15%">Table Name</th>
                        <td>{{ $log->table_name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 15%">Row ID</th>
                        <td>{{ $log->row_id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 15%">Action By</th>
                        <td class="user-id">
                            {{ $log->user->name}}
                            @can('users.show')
                                <div class="btn-group btn-group-sm float-right" role="group">
                                    <a href="{{ route('users.show', $log->user_id) }}" class="btn btn-white">
                                        <i class="fas fa-lg fa-eye text-info" title="User details"></i>
                                    </a>
                                    <button type="button" class="btn btn-white view-user" data-user-id="{{ $log->user_id }}">
                                        <i class="fas fa-lg fa-info-circle text-orange" title="More info?"></i>
                                    </button>
                                </div>
                            @endcan
                        </td>
                    </tr>
                    <tr style="width: 15%">
                        <th>Time</th>
                        <td class="text-danger text-bold">{{ $log->formatted_date }}</td>
                    </tr>
                    <tr>
                        <th style="width: 15%">Old Data</th>
                        <td>
                            <pre>{{ json_encode(json_decode($log->old_data), JSON_PRETTY_PRINT) }}</pre>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 15%">{{ $log->action == 'updated' ? 'Updated Data' : 'New Data' }}</th>
                        <td>
                            <pre>{{ json_encode(json_decode($log->new_data), JSON_PRETTY_PRINT) }}</pre>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 15%">Request URL</th>
                        <td>{{ $log->request_url ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 15%">Request Method</th>
                        <td>{{ $log->request_method ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 15%">Status Code</th>
                        <td>{{ $log->status_code ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 15%">Remote Address</th>
                        <td>{{ $log->remote_address ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 15%">Path</th>
                        <td>{{ $log->path ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 15%">Host</th>
                        <td>{{ $log->host ?? 'N/A' }}</td>
                    </tr>
                </table>

                <div class="float-right mt-4">
                    @can('logs.forceDelete')
                        <div class="modal fade" id="deleteModal{{ $log->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Pressing the delete button will permanently delete the log. Are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('logs.forceDelete', $log->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button to trigger the modal -->
                        <button class="btn btn-danger" title="Delete" data-toggle="modal"
                            data-target="#deleteModal{{ $log->id }}">
                            Delete Permanently
                        </button>
                    @endcan
                    @can('logs.index')
                        <a href="{{ route('logs.index') }}" class="btn btn-default">Back</a>
                    @endcan
                </div>
            </div>

            {{-- User logs model --}}
            <div class="modal fade" id="userDetailsModal" tabindex="-1" role="dialog"
                aria-labelledby="userDetailsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="userDetailsModalLabel">User Details</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.user-id').click(function() {
                var userId = $(this).text();
                $.ajax({
                    url: '/logs/user-details/' + userId,
                    type: 'GET',
                    success: function(data) {
                        var modalContent = '<p><strong>Name:</strong> ' + data.name + '</p>' +
                            '<p><strong>Email:</strong> ' + data.email + '</p>' +
                            '<p><strong>Username:</strong> ' + data.username + '</p>' +
                            '<h4>Roles and Permissions</h4>' +
                            '<div class="scrollable-list">';

                        data.roles.forEach(function(role) {
                            modalContent += '<div class="role"><strong>' + role.name +
                                '</strong></div><ul>';
                            role.permissions.forEach(function(permission) {
                                modalContent += '<li>' + permission.name +
                                    '</li>';
                            });
                            modalContent += '</ul>';
                        });

                        modalContent += '</div>';

                        $('#userDetailsModal .modal-body').html(modalContent);
                        $('#userDetailsModal').modal('show');
                    }
                });
            });
        });
    </script>
@endsection
