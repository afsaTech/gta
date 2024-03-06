@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Package Images
@endsection

@section('content')
    <!-- content to be displayed here -->
    <div class="card">
        <div class="card-header">
            <h3 class="my-1 float-left"> <i class="fas fa-info-circle blue"></i>&nbsp;Package Images Details</h3>

            <div class="float-right">
                <div class="btn-group btn-group-sm" role="group">
                    @can('package-images.index')
                        <a href="{{ route('package-images.index') }}" class="btn btn-outline-primary" title="List all">
                            <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        </a>
                    @endcan
                    @can('package-images.create')
                        <a href="{{ route('package-images.create') }}" class="btn btn-outline-success" title="Add New">
                            <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Package Name :</b> {{ $image->package->title ?? 'N/A' }} </li>
                <li class="list-group-item"><p class="text-bold"> Image :</p>
                    @if($image->url != null)
                    <img src="{{ asset('storage/' . $image->url) }}" class="mb-4" alt="Package Image" width="350px" height="250px">
                    @else
                     {{ "Image Not Available..." }}
                    @endif
                </li>
                <p class="mb-4"></p>
                @role('admin')
                    <li class="list-group-item"><b>Created By:</b> {{ $image->createdBy->name ?? 'N/A' }} </li>
                    <li class="list-group-item"><b>Created At:</b> {{ $image->created_at ?? 'N/A' }}</li>

                    <li class="list-group-item"><b>Updated By:</b> {{ $image->updatedBy->name ?? 'N/A' }}</li>
                    <li class="list-group-item"><b>Updated At:</b> {{ $image->updated_at ?? 'N/A' }}</li>
                @endrole
            </ul>

            <div class="float-left ml-4 mt-4">
                @can('package-images.edit')
                    <a href="{{ route('package-images.edit', $image->id) }}" class="btn btn-info">Edit</a>
                @endcan
                @can('package-images.index')
                    <a href="{{ route('package-images.index') }}" class="btn btn-default">Back</a>
                @endcan
            </div>

            @hasrole('admin')
                @can('package-images.forceDelete')
                    <div class="float-right mt-4">
                        <div class="modal fade" id="deleteModal{{ $image->id }}" tabindex="-1"
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
                                        Pressing the delete button will permanently delete the Packe Image. Are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('package-images.forceDelete', $image->id) }}" method="post">
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
                            data-target="#deleteModal{{ $image->id }}">
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
