<div class="form-row">
    <div class="form-group col-md-4">
        <label for="name" class="control-label">Name&nbsp;<span style="color:red">*</span></label>
        <input type="text" name="name" class="form-control" aria-describedby="Name"
            value="{{ $role->name ?? old('name') }}" placeholder="Enter role name" required>
    </div>
    <div class="form-group col-md-8 table-responsive p-0">
        <label for="permissions" class="control-label">Assign Permissions&nbsp;<span style="color:red">*</span></label>
        <table class="table table-simple">
            <thead>
                <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                <th scope="col" width="20%">Name</th>
                <th scope="col" width="1%">Guard</th>
            </thead>

            @foreach ($permissions as $permission)
                <tr>
                    <td>
                        <input type="checkbox" name="permission[{{ $permission->name }}]"
                            value="{{ $permission->name }}" class='permission'
                            {{ isset($role) && $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                    </td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

{{-- Buttons --}}
<div class="form-group mt-2 d-flex justify-content-end">
    @if (Route::currentRouteName() == 'roles.create')
        @can('roles.store')
            <div class="col-md-2 ml-2">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        @endcan
    @elseif(Route::currentRouteName() == 'roles.edit')
        @can('roles.update')
            <div class="col-md-2">
                <button type="submit" class="btn btn-info btn-block">Update</button>
            </div>
        @endcan
    @endif
    @can('roles.index')
        <div class="col-md-2">
            <a href="{{ route('roles.index') }}" class="btn btn-default btn-block">Back</a>
        </div>
    @endcan
</div>
