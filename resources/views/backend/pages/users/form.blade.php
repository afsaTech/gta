<div class="form-row">
    <div class="form-group col-md-12">
        <label for="Name" class="control-label">Name&nbsp;<span style="color:red">*</span></label>
        <input type="text" name="name" class="form-control" aria-describedby="Name"
            value="{{ $user->name ?? old('name') }}" placeholder="Enter name" required>
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="email" class="control-label">Email Address&nbsp;<span style="color:red">*</span></label>
        <input type="email" name="email" class="form-control" aria-describedby="Email"
            value="{{ $user->email ?? old('email') }}" placeholder="Enter email" required>
        @if ($errors->has('email'))
            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
        @endif
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="username" class="control-label">Username&nbsp;<span style="color:red">*</span></label>
        <input type="text" name="username" class="form-control" aria-describedby="Username"
            value="{{ $user->username ?? old('username') }}" placeholder="Enter username" required>
        @if ($errors->has('username'))
            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
        @endif
    </div>
</div>

@if (Route::currentRouteName() == 'users.edit')
    <div class="form-row">
        <div class="form-group  col-md-12">
            <label class="control-label">Role&nbsp;<span style="color:red">*</span> </label>
            <select name="role" class="form-control select2" required>
                <option value="">Select role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}"
                        {{ in_array($role->name, $userRole) ? 'selected' : '' }}>
                        {{ $role->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('role'))
                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
            @endif
        </div>
    </div>
@endif

{{-- Buttons --}}
<div class="form-group mt-4">
    <div class="row">
        @if (Route::currentRouteName() == 'users.create')
            @can('users.store')
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            @endcan
        @elseif(Route::currentRouteName() == 'users.edit')
            @can('users.update')
                <div class="col-md-2">
                    <button type="submit" class="btn btn-info btn-block">Update</button>
                </div>
            @endcan
        @endif
        @can('users.index')
            <div class="col-md-2">
                <a href="{{ route('users.index') }}" class="btn btn-default btn-block">Back</a>
            </div>
        @endcan
    </div>
</div>
