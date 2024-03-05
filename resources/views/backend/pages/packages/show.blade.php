@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Package
@endsection

@section('content')
    <!-- content to be displayed here -->
    <div class="card">
        <div class="card-header">
            <h3 class="my-1 float-left"> <i class="fas fa-info-circle blue"></i>&nbsp;Package Details</h3>

            <div class="float-right">
                <div class="btn-group btn-group-sm" role="group">
                    @can('packages.index')
                        <a href="{{ route('packages.index') }}" class="btn btn-outline-primary" title="List all">
                            <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        </a>
                    @endcan
                    @can('packages.create')
                        <a href="{{ route('packages.create') }}" class="btn btn-outline-success" title="Add New">
                            <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Title:</b> {{ $package->title }}</li>
                <li class="list-group-item"><b>Description:</b> {{ $package->description }}</li>
                <li class="list-group-item"><b>Size:</b> {{ $package->size }}</li>
                <li class="list-group-item"><b>Days:</b> {{ $package->days }}</li>
                <li class="list-group-item"><b>Nights:</b> {{ $package->nights }}</li>
                <li class="list-group-item"><b>Regular Price:</b> {{ $package->regular_price }}</li>
                <li class="list-group-item"><b>Sales Price:</b> {{ $package->sales_price }}</li>
                <li class="list-group-item"><b>Discount:</b> {{ $package->discount }}</li>
                <li class="list-group-item"><b>Region:</b> {{ $package->region }}</li>
                <li class="list-group-item"><b>Destination:</b> {{ $package->destination }}</li>
                <li class="list-group-item"><b>Date:</b> {{ $package->date }}</li>
                <li class="list-group-item"><b>Keyword:</b> {{ $package->keyword }}</li>
                <li class="list-group-item"><b>Is Popular:</b> {{ $package->is_popular ? 'Yes' : 'No' }}</li>
                <li class="list-group-item"><b>Status:</b> {{ ucfirst($package->status) }}</li>
            </ul>            

            <div class="float-left ml-4 mt-4">
                @can('packages.edit')
                    <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-info">Edit</a>
                @endcan
                @can('packages.index')
                    <a href="{{ route('packages.index') }}" class="btn btn-default">Back</a>
                @endcan
            </div>

            @hasrole('admin')
                @can('packages.forceDelete')
                    <div class="float-right mt-4">
                        <div class="modal fade" id="deleteModal{{ $package->id }}" tabindex="-1"
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
                                        <form action="{{ route('packages.forceDelete', $package->id) }}" method="post">
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
                            data-target="#deleteModal{{ $package->id }}">
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
