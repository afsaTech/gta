@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Premier Picks
@endsection

@section('content')
    <!-- content to be displayed here -->
    <div class="card">
        <div class="card-header">
            <h3 class="my-1 float-left"> <i class="fas fa-info-circle blue"></i>&nbsp;Premier Pick Details</h3>

            <div class="float-right">
                <div class="btn-group btn-group-sm" role="group">
                    @can('top-notch-destinations.index')
                        <a href="{{ route('top-notch-destinations.index') }}" class="btn btn-outline-primary" title="List all">
                            <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        </a>
                    @endcan
                    @can('top-notch-destinations.create')
                        <a href="{{ route('top-notch-destinations.create') }}" class="btn btn-outline-success" title="Add New">
                            <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Name :</b> {{ ucfirst($tnd->name) }} </li>
                <li class="list-group-item"><b>Description :</b> {{ ucfirst($tnd->description) }} </li>
                <li class="list-group-item"><b>Location :</b> {{ ucfirst($tnd->location ) }} </li>
                <li class="list-group-item"><b>Rating :</b> {{ $tnd->rating }} </li>

                <li class="list-group-item mt-4 mb-4">
                    <img src="{{ asset('storage/' . $tnd->image_url) }}" alt="Top notch destination image" width="200px" height="180px">
                </li>

            </ul>

            <div class="float-left ml-4 mt-4">
                @can('top-notch-destinations.edit')
                    <a href="{{ route('top-notch-destinations.edit', $tnd->id) }}" class="btn btn-info">Edit</a>
                @endcan
                @can('top-notch-destinations.index')
                    <a href="{{ route('top-notch-destinations.index') }}" class="btn btn-default">Back</a>
                @endcan
            </div>

            @hasrole('admin')
                @can('top-notch-destinations.forceDelete')
                    <div class="float-right mt-4">
                        <div class="modal fade" id="deleteModal{{ $tnd->id }}" tabindex="-1"
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
                                        Pressing the delete button will permanently delete the post. Are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('top-notch-destinations.forceDelete', $tnd->id) }}" method="post">
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
                            data-target="#deleteModal{{ $tnd->id }}">
                            Delete Permanently
                        </button>
                    </div>
                @endcan
            @endhasrole

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
