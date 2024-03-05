<div class="form-row">
    <div class="form-group col-md-12">
        @if (Route::currentRouteName() == 'permissions.create')
            <label for="name" class="control-label">Route Name&nbsp;<span style="color:red">*</span></label>
            <div class="select2-dark">
                <select name="name[]" class="select2" id="name" multiple="multiple" data-placeholder="Name"
                    data-dropdown-css-class="select2-dark" style="width: 100%;"
                    {{ count($routeNames) == 0 ? 'disabled' : '' }}>
                    @foreach ($routeNames as $routeName)
                        <option value="{{ $routeName }}">{{ $routeName }}</option>
                    @endforeach
                </select>
            </div>
        @else
            <label for="name" class="control-label">Name&nbsp;<span style="color:red">*</span></label>
            <input type="text" name="name" class="form-control" aria-describedby="Name"
                value="{{ $permission->name ?? old('name') }}" required>
        @endif
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>

{{-- Buttons --}}
<div class="form-group mt-4 d-flex">
    @if (Route::currentRouteName() == 'permissions.create')
        @can('permissions.store')
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block"
                    {{ count($routeNames) == 0 ? 'disabled' : '' }}>Save</button>
            </div>
        @endcan
    @elseif(Route::currentRouteName() == 'permissions.edit')
        @can('permissions.update')
            <div class="col-md-2">
                <button type="submit" class="btn btn-info btn-block">Update</button>
            </div>
        @endcan
    @endif
    @can('permissions.index')
        <div class="col-md-2">
            <a href="{{ route('permissions.index') }}" class="btn btn-default btn-block">Back</a>
        </div>
    @endcan
</div>
