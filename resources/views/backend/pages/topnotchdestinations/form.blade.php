<div class="form-row">
    <div class="form-group col-md-12">
        <label for="name" class="control-label">Name&nbsp;<span style="color:red">*</span></label>
        <input type="text" name="name" class="form-control" aria-describedby="name"
            value="{{ $tnd->name ?? old('name') }}" placeholder="Enter name" required>
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label for="description" class="control-label">Description</label>
        <textarea class="form-control" aria-describedby="description" name="description" placeholder="Enter description" required>{{ $tnd->description ?? old('description') }}</textarea>

        @if ($errors->has('description'))
            <span class="text-danger text-left">{{ $errors->first('description') }}</span>
        @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label for="location" class="control-label">Location</label>
        <select class="form-control select2 mySelect" name="location" id="location" required autocomplete="true">
            <option value="{{ $tnd->location ?? ''}}" style="display: none; color: transparent;" hidden>{{ $tnd->location ??  'Choose Location' }}</option>
            <option value="ngorongoro">Ngorongoro</option>
            <option value="tarangire">Tarangire</option>
            <option value="mikumi">Mikumi</option>
            <option value="manyara">Manyara</option>
        </select>

        @if ($errors->has('location'))
            <span class="text-danger text-left">{{ $errors->first('location') }}</span>
        @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label for="rating" class="control-label">Rating</label>
        <select class="form-control select2 mySelect" name="rating" id="rating" required
            autocomplete="true">
            <option value="{{ $tnd->rating ?? ''}}" style="display: none; color: transparent;" selected>{{ $tnd->rating ?? 'Rate 1 to 5 eg: 4' }}</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        @if ($errors->has('rating'))
            <span class="text-danger text-left">{{ $errors->first('rating') }}</span>
        @endif
    </div>
</div>

<div class="form-row mt-4">
    <div class="form-group col-md-12">
        <label for="image" class="control-label">Images</label>

        <!-- Dropzone Container -->
        <div id="dropzone-container" class="dropzone">
            <div class="dz-default dz-message">
                <span>Drop images here or click to upload</span>
            </div>
            <!-- Input file field -->
            <input type="file" name="image_url" id="image_url" multiple style="display: none;" accept=".jpg, .jpeg, .png, .svg" />
            <input type="hidden" name="image_url" value="{{$tnd->image_url ?? ''}}" id="image_url">
        </div>
        
        <!-- Image Preview Section -->
        <div id="image-preview" class="mt-3">
            <div id="preview-thumbnails" class="row"></div>
            @if(Route::currentRouteName() == 'top-notch-destinations.edit')
                @if($tnd->image_url !== null)
                    <img src="{{ asset('storage/' . $tnd->image_url) }}" alt="Top notch destination image" width="200px" height="180px">
                @endif
            @endif
        </div>
    </div>
</div>

{{-- Buttons --}}
<div class="form-group mt-4">
    <div class="row">
        @if (Route::currentRouteName() == 'top-notch-destinations.create')
            @can('top-notch-destinations.store')
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            @endcan
        @elseif(Route::currentRouteName() == 'top-notch-destinations.edit')
            @can('top-notch-destinations.update')
                <div class="col-md-2">
                    <button type="submit" class="btn btn-info btn-block">Update</button>
                </div>
            @endcan
        @endif
        @can('top-notch-destinations.index')
            <div class="col-md-2">
                <a href="{{ route('top-notch-destinations.index') }}" class="btn btn-default btn-block">Back</a>
            </div>
        @endcan
    </div>
</div>
