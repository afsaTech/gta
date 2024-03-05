@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Package Images
@endsection

@section('css')
    <!-- DataTables js-->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="my-1 float-left"> <i class="fas fa-info-circle blue"></i>&nbsp;All Package Images</h3>
            @can('package-images.create')
                <div class="btn-group btn-group-sm float-right" role="group">
                    <a href="{{ route('package-images.create') }}" class="btn btn-outline-success" title="Add New">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                </div>
            @endcan
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <table id="datatable" class="table table-bordered">
                <thead>
                    <tr style="background-color: #f8f9fa;">
                        <th width="5%">S/N</th>
                        <th>Package Title / Images</th>
                        <th width="5%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packageImages as $packageID => $packageImagesGroup)
                        <tr style="background-color: #f8f9fa;">
                            <td colspan="4">{{ ucfirst($packageImagesGroup->first()->package->title) ?? 'N/A' }}</td>
                         @foreach ($packageImagesGroup as $key => $packageImage)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $packageImage->url) }}" alt="Package Image" width="80px"
                                    height="50px">
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm float-right" role="group">
                                    @can('package-images.show')
                                        <a href="{{ route('package-images.show', $packageImage->id) }}">
                                            <button class="btn btn-default btn-sm" title="Show">
                                                <i class=" fas fa-fw fa-eye text-info" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    @endcan
                                    @can('package-images.edit')
                                        <a href="{{ route('package-images.edit', $packageImage->id) }}">
                                            @csrf
                                            <button class="btn btn-default btn-sm" title="Edit">
                                                <i class=" fas fa-fw fa-pencil-alt fa-sm text-primary" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    @endcan
                                    @can('package-images.destroy')
                                        <!-- Modal for Confirmation -->
                                        <div class="modal fade" id="deleteModal{{ $packageImage->id }}" tabindex="-1"
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
                                                        <form action="{{ route('package-images.destroy', $packageImage->id) }}"
                                                            method="post">
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
                                            data-target="#deleteModal{{ $packageImage->id }}">
                                            <i class="fas fa-fw fa-trash fa-sm text-danger" aria-hidden="true"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
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
