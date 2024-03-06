<div class="row mb-4">
    <div class="col-md-12">
        <div class="card card-light h-100">
            <div class="card-header">
                <h3 class="card-title text-bold font-weight-bold">Basic Information</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="category" class="control-label">Category&nbsp;<span
                                        style="color:red">*</span></label>
                                <select class="form-control select2 mySelect" name="category_id" id="category" required
                                    autocomplete="true">
                                    <option value="{{$package->category->id ?? ''}}" style="display: none; color: transparent;" disabled>{{$package->category->name ?? 'Choose Category'}}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-danger text-left">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="description" class="control-label">Description&nbsp;<span
                                        style="color:red">*</span></label>
                                <textarea class="form-control" aria-describedby="description" name="description" placeholder="Enter description"
                                    id="description" required>{{ $package->description ?? old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="title" class="control-label">Title&nbsp;<span
                                        style="color:red">*</span></label>
                                <input type="text" name="title" class="form-control" aria-describedby="title"
                                    value="{{ $package->title ?? old('title') }}" id="title"
                                    placeholder="Enter title" required>
                                @if ($errors->has('title'))
                                    <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="size" class="control-label">Group Size&nbsp;<span
                                        style="color:red">*</span>&nbsp;&nbsp;<span
                                        title="Max number of participants in a group eg: 3,2,4,5 etc"
                                        style="color: #0005">?</span></label>
                                <input type="number" name="size" class="form-control" aria-describedby="size"
                                    value="{{ $package->size ?? old('size') }}" id="size" placeholder="eg: 3"
                                    required>

                                @if ($errors->has('size'))
                                    <span class="text-danger text-left">{{ $errors->first('size') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="{{ ((Route::currentRouteName() == 'packages.create') ? 'col-md-4' : 'col-md-6') }}">
        <div class="card card-light h-100">
            <div class="card-header">
                <h3 class="card-title text-bold font-weight-bold">Trip Duration</h3>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="days" class="control-label">Days&nbsp;<span style="color:red">*</span></label>
                        <input type="number" name="days" class="form-control" aria-describedby="days"
                            value="{{ $package->days ?? old('days') }}" placeholder="Enter days" id="days"
                            required>
                        @if ($errors->has('days'))
                            <span class="text-danger text-left">{{ $errors->first('days') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nights" class="control-label">Nights&nbsp;<span style="color:red">*</span></label>
                        <input type="number" name="nights" class="form-control" aria-describedby="nights"
                            value="{{ $package->nights ?? old('nights') }}" id="nights" placeholder="Enter nights"
                            required>

                        @if ($errors->has('nights'))
                            <span class="text-danger text-left">{{ $errors->first('nights') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="{{ ((Route::currentRouteName() == 'packages.create') ? 'col-md-4' : 'col-md-6') }}">
        <div class="card card-light h-100">
            <div class="card-header">
                <h3 class="card-title text-bold font-weight-bold">Pricing</h3>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="regular-price" class="control-label">Regular Price&nbsp;<span
                                style="color:red">*</span></label>
                        <input type="text" name="regular_price" class="form-control"
                            aria-describedby="regular-price"
                            value="{{ $package->regular_price ?? old('regular_price') }}" id="regular-price"
                            placeholder="Enter regular price" required>
                        @if ($errors->has('regular_price'))
                            <span class="text-danger text-left">{{ $errors->first('regular_price') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="sales-price" class="control-label">Sales Price</label>
                        <input type="text" name="sales_price" class="form-control" aria-describedby="sales-price"
                            value="{{ $package->sales_price ?? old('sales_price') }}" id="sales-price"
                            placeholder="Enter sales price" required>

                        @if ($errors->has('sales_price'))
                            <span class="text-danger text-left">{{ $errors->first('sales_price') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="discount" class="control-label">Discount (%)&nbsp;<span
                                title="Discount should be in percentage integer eg: 10,20,30 etc"
                                style="color: #0005">?</span></label>
                        <input type="text" name="discount" class="form-control" aria-describedby="discount"
                            value="{{ $package->discount ?? old('discount') }}" id="discount" placeholder="eg: 20"
                            required>

                        @if ($errors->has('discount'))
                            <span class="text-danger text-left">{{ $errors->first('discount') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Route::currentRouteName() == 'packages.create')
    <div class="{{ ((Route::currentRouteName() == 'packages.create') ? 'col-md-4' : 'col-md-6') }}">
        <div class="card card-light h-100">
            <div class="card-header">
                <h3 class="card-title text-bold font-weight-bold">Location</h3>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="region" class="control-label">Region&nbsp;<span
                                style="color:red">*</span></label>
                        <select class="form-control select2 mySelect" name="region" id="region" required
                            autocomplete="true">
                            <option value="{{ $package->region ?? ''}}" style="display: none; color: transparent;" disabled>{{ $package->region ??  'Choose Region' }}</option>
                            <option value="arusha">Arusha</option>
                            <option value="mara">Mara</option>
                            <option value="njombe">Njombe</option>
                            <option value="manyara">Manyara</option>
                        </select>

                        @if ($errors->has('region'))
                            <span class="text-danger text-left">{{ $errors->first('region') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="destination" class="control-label">Destination&nbsp;<span
                                style="color:red">*</span></label>
                        <select class="form-control select2 mySelect" name="destination" id="destination" required
                            autocomplete="true">
                            <option value="{{ $package->destination ?? ''}}" style="display: none; color: transparent;" disabled>{{ $package->destination ??  'Choose Destination' }}</option>
                            <option value="serengeti">Serengeti NP</option>
                            <option value="ngorongoro">Ngorongoro NP</option>
                            <option value="tarangire">Tarangire NP</option>
                            <option value="lake manyara">Lake Manyara NP</option>
                        </select>

                        @if ($errors->has('destination'))
                            <span class="text-danger text-left">{{ $errors->first('destination') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<div class="row mb-4">
    <div class="{{ ((Route::currentRouteName() == 'packages.create') ? 'col-md-4' : 'col-md-6') }}">
        <div class="card card-light h-100">
            <div class="card-header">
                <h3 class="card-title text-bold font-weight-bold">Additional Information</h3>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="date" class="control-label">Date&nbsp;<span
                                style="color:red">*</span></label>
                        <input type="date" name="date" class="form-control" aria-describedby="keyword"
                            value="{{ $package->date ?? old('date') }}" id="date" required />

                        @if ($errors->has('date'))
                            <span class="text-danger text-left">{{ $errors->first('date') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="keyword" class="control-label">keyword</label>
                        <input type="text" name="keyword" class="form-control" aria-describedby="keyword"
                            value="{{ $package->keyword ?? old('keyword') }}" id="keyword"
                            placeholder="eg: safari, adventure" required>

                        @if ($errors->has('keyword'))
                            <span class="text-danger text-left">{{ $errors->first('keyword') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="is-popular" class="control-label">Popularality</label>
                        <select class="form-control select2 mySelect" name="is_popular" id="is-popular" required
                            autocomplete="true">
                            <option value="{{ $package->is_popular ?? ''}}" style="display: none; color: transparent;" disabled>{{ $package->is_popular ??  'Choose Popularality' }}</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>

                        @if ($errors->has('is_popular'))
                            <span class="text-danger text-left">{{ $errors->first('is_popular') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="status" class="control-label">Status</label>
                        <select class="form-control select2 mySelect" name="status" id="status" required
                            autocomplete="true">
                            <option value="{{ $package->status ?? ''}}" style="display: none; color: transparent;" disabled>{{ $package->status ??  'Choose Status' }}</option>
                            <option value="available">Available</option>
                            <option value="booked">Booked</option>
                            <option value="sold out">Sold Out</option>
                        </select>

                        @if ($errors->has('status'))
                            <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Route::currentRouteName() == 'packages.create')
    <div class="col-md-8">
        <div class="card card-light h-100">
            <div class="card-header">
                <h3 class="card-title text-bold font-weight-bold">Upload Images</h3>
            </div>

            <div class="card-body">
                <!-- Dropzone Container -->
                <div id="dropzone-container" class="dropzone">
                    <div class="dz-default dz-message">
                        <span>Drop images here or click to upload</span>
                    </div>
                    <!-- Input file field -->
                    <input type="file" name="images[]" id="images" multiple style="display: none;"
                        accept=".jpg, .jpeg, .png, .svg" />
                </div>

                <!-- Image Preview Section -->
                <div id="image-preview" class="mt-3">
                    <div id="preview-thumbnails" class="row"></div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="{{ ((Route::currentRouteName() == 'packages.create') ? 'col-md-4' : 'col-md-6') }}">
        <div class="card card-light h-100">
            <div class="card-header">
                <h3 class="card-title text-bold font-weight-bold">Location</h3>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="region" class="control-label">Region&nbsp;<span
                                style="color:red">*</span></label>
                        <select class="form-control select2 mySelect" name="region" id="region" required
                            autocomplete="true">
                            <option value="{{ $package->region ?? ''}}" style="display: none; color: transparent;" disabled>{{ $package->region ??  'Choose Region' }}</option>
                            <option value="arusha">Arusha</option>
                            <option value="mara">Mara</option>
                            <option value="njombe">Njombe</option>
                            <option value="manyara">Manyara</option>
                        </select>

                        @if ($errors->has('region'))
                            <span class="text-danger text-left">{{ $errors->first('region') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="destination" class="control-label">Destination&nbsp;<span
                                style="color:red">*</span></label>
                        <select class="form-control select2 mySelect" name="destination" id="destination" required
                            autocomplete="true">
                            <option value="{{ $package->destination ?? ''}}" style="display: none; color: transparent;" disabled>{{ $package->destination ??  'Choose Destination' }}</option>
                            <option value="serengeti">Serengeti NP</option>
                            <option value="ngorongoro">Ngorongoro NP</option>
                            <option value="tarangire">Tarangire NP</option>
                            <option value="lake manyara">Lake Manyara NP</option>
                        </select>

                        @if ($errors->has('destination'))
                            <span class="text-danger text-left">{{ $errors->first('destination') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>


{{-- Buttons --}}
<div class="form-group mt-4">
    <div class="row">
        @if (Route::currentRouteName() == 'packages.create')
            @can('packages.store')
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            @endcan
        @elseif(Route::currentRouteName() == 'packages.edit')
            @can('packages.update')
                <div class="col-md-6">
                    <button type="submit" class="btn btn-info btn-block">Update</button>
                </div>
            @endcan
        @endif
        @can('packages.index')
            <div class="col-md-6">
                <a href="{{ route('packages.index') }}" class="btn btn-default btn-block">Back</a>
            </div>
        @endcan
    </div>
</div>
