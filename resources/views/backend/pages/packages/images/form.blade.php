<div class="form-row mb-4">
    <div class="form-group col-md-12">
        <label for="package-id" class="control-label">Package&nbsp;<span style="color:red">*</span></label>
        <select class="form-control select2" name="package_id" id="package-id" required>
        <option value="{{ $image->package->id ?? ''}}" style="display: none; color: transparent;" selected> {{ $image->package->title  ?? 'Choose Package' }}</option>

            @foreach ($packages as $package)
            <option value="{{ $package->id }}">{{ ucfirst($package->title) }}</option>
            @endforeach
        </select>
        @if ($errors->has('package_id'))
        <span class="text-danger text-left">{{ $errors->first('package_id') }}</span>
        @endif
    </div>
</div>

<div class="form-row mt-4">
    <div class="form-group col-md-12">
        <label for="url" class="control-label">Images&nbsp;<span style="color:red">*</span></label>

        <!-- Dropzone Container -->
        <div id="dropzone-container" class="dropzone">
            <div class="dz-default dz-message">
                <span>Drop images here or click to upload</span>
            </div>
            <!-- Input file field -->
            <input type="file" name="url" id="url" multiple style="display: none;" accept=".jpg, .jpeg, .png, .svg" />
            @if(Route::currentRouteName() == 'package-images.edit')
            <input type="hidden" name="url" value="{{$image->url ?? ''}}" id="url">
            @endif 
        </div>
        
        <!-- Image Preview Section -->
        <div id="image-preview" class="mt-3">
            <div id="preview-thumbnails" class="row"></div>
            @if(Route::currentRouteName() == 'package-images.edit' && $image->url !== null)
                <img src="{{ asset('storage/' . $image->url) }}" alt="Package Image" width="200px" height="150px">
            @endif
        </div>
    </div>
</div>


{{-- Buttons --}}
<div class="form-group mt-4">
    <div class="row">
        @if (Route::currentRouteName() == 'package-images.create')
            @can('package-images.store')
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            @endcan
        @elseif(Route::currentRouteName() == 'package-images.edit')
            @can('package-images.update')
                <div class="col-md-2">
                    <button type="submit" class="btn btn-info btn-block">Update</button>
                </div>
            @endcan
        @endif
        @can('package-images.index')
            <div class="col-md-2">
                <a href="{{ route('package-images.index') }}" class="btn btn-default btn-block">Back</a>
            </div>
        @endcan
    </div>
</div>
