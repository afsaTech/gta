@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - User
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="my-1 float-left"> <i class="fas fa-info-circle text-info"></i>&nbsp;User Details</h3>

            <div class="float-right">
                <div class="btn-group btn-group-sm" role="group">
                    @can('users.index')
                        <a href="{{ route('users.index') }}" class="btn btn-outline-primary" title="List all">
                            <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        </a>
                    @endcan
                    @can('users.create')
                        <a href="{{ route('users.create') }}" class="btn btn-outline-success" title="Add New">
                            <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Name :</b> {{ Str::ucfirst($user->name) }}</li>
                <li class="list-group-item"><b>Email :</b> {{ $user->email ?? 'N/A' }}</li>
                <li class="list-group-item"><b>Username:</b> {{ $user->username }}</li>
                <p class="mb-4"></p>
                @role('admin')
                    <li class="list-group-item"><b>Created By:</b> {{ $user->creator->name ?? 'N/A' }}</li>
                    <li class="list-group-item"><b>Created At:</b> {{ $user->created_at ?? 'N/A' }}</li>

                    <li class="list-group-item"><b>Updated By:</b> {{ $user->updater->name ?? 'N/A' }}</li>
                    <li class="list-group-item"><b>Updated At:</b> {{ $user->updated_at ?? 'N/A' }}</li>
                @endrole
            </ul>

            <div class="float-left ml-4 mt-4">
                @can('users.edit')
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                @endcan
                @can('users.index')
                    <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
                @endcan
            </div>

            @role('admin')
                @can('users.forceDelete')
                    <div class="float-right mt-4">
                        <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1"
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
                                        Pressing the delete button will permanently delete the user. Are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('users.forceDelete', $user->id) }}" method="post">
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
                            data-target="#deleteModal{{ $user->id }}">
                            Delete Permanently
                        </button>
                    </div>
                @endcan
            @endrole
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
