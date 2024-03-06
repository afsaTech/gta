@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Role
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="my-1 float-left"> <i class="fas fa-info-circle blue"></i>&nbsp;Role Details</h3>

            <div class="float-right">
                <div class="btn-group btn-group-sm" role="group">
                    @can('roles.index')
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-primary" title="List all">
                            <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        </a>
                    @endcan
                    @can('roles.create')
                        <a href="{{ route('roles.create') }}" class="btn btn-outline-success" title="Add New">
                            <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Role : </b>{{ ucfirst($role->name) }}</li>
                @if ($rolePermissions->count() > 0)
                    <li class="list-group-item">
                        <div class="container mt-3 float-left">
                            <h4>Assigned Permissions</h4>

                            <table class="table table-bordered">
                                <thead>
                                    <th scope="col" width="20%">Name</th>
                                    <th scope="col" width="1%">Guard</th>
                                </thead>

                                @foreach ($rolePermissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->guard_name }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </li>
                @else
                    <li class="list-group-item">No permissions assigned</li>
                @endif
            </ul>

            <div class="float-right mt-4">
                @can('roles.edit')
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
                @endcan
                @can('roles.index')
                    <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
                @endcan
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
