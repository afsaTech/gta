<div class="form-row">
    <div class="form-group col-md-12">
        <label for="name" class="control-label">Name&nbsp;<span style="color:red">*</span></label>
        <input type="text" name="name" class="form-control" aria-describedby="Name"
            value="{{ $category->name ?? old('name') }}" placeholder="Enter name" required>
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>

<input type="hidden" name="slug" id="slug" value="{{ $category->slug ?? old('slug') }}">

<div class="form-row">
    <div class="form-group col-md-12">
        <label for="description" class="control-label">Description&nbsp;<span style="color:red">*</span></label>
        <textarea class="form-control" aria-describedby="description" name="description" placeholder="Enter description" required>{{ $category->description ?? old('description') }}</textarea>

        @if ($errors->has('description'))
            <span class="text-danger text-left">{{ $errors->first('description') }}</span>
        @endif
    </div>
</div>

{{-- Buttons --}}
<div class="form-group mt-4">
    <div class="row">
        @if (Route::currentRouteName() == 'categories.create')
            @can('categories.store')
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            @endcan
        @elseif(Route::currentRouteName() == 'categories.edit')
            @can('categories.update')
                <div class="col-md-2">
                    <button type="submit" class="btn btn-info btn-block">Update</button>
                </div>
            @endcan
        @endif
        @can('categories.index')
            <div class="col-md-2">
                <a href="{{ route('categories.index') }}" class="btn btn-default btn-block">Back</a>
            </div>
        @endcan
    </div>
</div>
