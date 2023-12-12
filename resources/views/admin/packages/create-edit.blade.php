@extends('admin.layout.app')

@section('content')

{{-- <div>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <script>alert({{$error}})</script>
        @endforeach
    @endif
</div> --}}
<!-- Begin Page Content -->
<form action="{{ $isEdit ? route('Packages.update',$package->id):route('Packages.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif
    <div class="row">
        <!-- Listings -->
        <div class="col-lg-8 col-xl-9">
            <div class="dashboard-box">
                <div class="custom-field-wrap">
                    <div class="form-group">
                        <label>{{__('Title')}}</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{$isEdit? $package->title : old('title')}}">
                        @error('title')
                         <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{__('Description')}}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{$isEdit ? $package->description : old('description')}}</textarea>
                        @error('description')
                         <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="dashboard-box">
                <div class="custom-field-wrap">
                    <h4>{{__('Dates and Prices')}}</h4>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-10">
                                    <div class="form-group">
                                        <label>Group Size</label>
                                        <input class="form-control @error('size') is-invalid @enderror" type="number" name="size" placeholder="No of Pax" value="{{$isEdit? $package->size : old('size')}}">
                                        @error('size')
                                         <div class="alert text-danger">{{ $message }}</div>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-10">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control @error('date') is-invalid @enderror" type="date" name="date"  value="{{$isEdit? $package->date : old('date')}}">
                                        @error('date')
                                            <div class="alert text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Trip Duration</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control @error('days') is-invalid @enderror " type="number" name="days" placeholder="Days" value="{{$isEdit? $package->days : old('days')}}">
                                        @error('days')
                                            <div class="alert text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control @error('nights') is-invalid @enderror " type="number" name="nights" placeholder="Nights" value="{{$isEdit? $package->days : old('nights')}}">
                                        @error('nights')
                                            <div class="alert text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control @error('category') is-invalid @enderror" name="category">
                                    <option>Select Package Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$isEdit ? ($package->category_id===$category->id ? 'selected' :'') :''}}> {{$category->name}} </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Sale Price</label>
                                <input class="form-control @error('sale_price') is-invalid @enderror " type="text" name="sale_price" value="{{$isEdit? $package->sale_price : old('sale_price')}}">
                                @error('sale_price')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Regular Price</label>
                                <input class="form-control @error('regular_price') is-invalid @enderror" type="text" name="regular_price" value="{{$isEdit? $package->regular_price : old('regular_price')}}">
                                @error('regular_price')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Discount</label>
                                <input class="form-control @error('discont') is-invalid @enderror" type="text" name="discount" value="{{$isEdit? $package->discount : old('discount')}}">
                                @error('discount')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-box">
                <h4>Gallery</h4>
                <div class="wrapper">
                    <div class="upload">
                        <div class="upload-wrapper">
                            <!--Image upload and uploaded image rendered from Gallary Js -->
                            <div class="row">
                                <div class="upload-img">
                                    <!--Image here-->
                                </div>
                            </div>
                            <div class="upload-info-wrapper">
                                <div class="upload-info">
                                    <p>
                                        <span class="upload-info-value">0</span> Photo (s) added.
                                    </p>
                                </div>
                                <div class="upload-area">
                                    <div class="upload-area-image">
                                      <!--  <i class="fa fa-add"></i>-->
                                      <span class="btn btn-success">Add Images</span>
                                    </div>
                                {{-- <p class="upload-area-text">Select images or <span>Browse</span></p> --}}
                                </div>
                                <input type="file" name="images[]" class="visually-hidden" id="upload-input" multiple>
                            </div>
                            
                           </div>
                    </div>
                    @error('images')
                        <div class="alert text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="dashboard-box">
                <h4>Location</h4>
                <div class="custom-field-wrap">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label selected>Region</label>
                                <select class="form-control @error('region') is-invalid @enderror" name="region" value="old('region')">
                                    <option selected>Dodoma</option>
                                    <option>Dar es salaam</option>
                                    <option>Arusha</option>
                                </select>
                                @error('region')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Destination</label>
                                <input class="form-control @error('location') is-invalid @enderror" type="text" name="destination" placeholder="Destination" value="{{$isEdit ? $package->destination : old('destination')}}" >
                                @error('destination')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xl-3">
            <div class="dashboard-box">
                <div class="custom-field-wrap">
                    <h4>Publish</h4>
                    <div class="publish-btn">
                        <div class="form-group">
                            <input type="submit" name="pending" value="Save Draft">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="preview" value="Preview">
                        </div>
                    </div>
                    <div class="publish-status">
                        <span>
                            <strong>Status:</strong>
                            Draft
                        </span>
                        <a href="#">Edit</a>
                    </div>
                    <div class="publish-status">
                        <span>
                            <strong>Visibility:</strong>
                            Poblic
                        </span>
                        <a href="#">Edit</a>
                    </div>
                    <div class="publish-status">
                        <span>
                            <strong>Visibility:</strong>
                            Poblic
                        </span>
                        <a href="#">Edit</a>
                    </div>
                    <div class="publish-action">
                        <input type="submit" name="publish" value="{{$isEdit? 'Update Package' :'Publish'}}">
                    </div>
                </div>
            </div>
            <div class="dashboard-box">
                <div class="custom-field-wrap db-pop-field-wrap">
                    <h4>Popular</h4>
                    <div class="form-group">
                        <label class="custom-input">
                            <input type="checkbox" name="popular">
                            <span class="custom-input-field"></span>
                            Use Popular
                        </label>
                    </div>
                </div>
                <div class="custom-field-wrap db-pop-field-wrap">
                    <h4>Keywords</h4>
                    <div class="form-group">
                        <input type="text" name="keyword" placeholder="Keywords">
                    </div>
                </div>
                <div class="custom-field-wrap db-cat-field-wrap">
                    <h4>Category</h4>
                    <div class="form-group">
                        <label class="custom-input"><input type="checkbox">
                            <span class="custom-input-field"></span>
                            Hotel
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-input"><input type="checkbox" checked="checked">
                            <span class="custom-input-field"></span>
                            Walking
                        </label>
                    </div>
                    <div class="add-btn">
                        <a href="#">Add category</a>
                    </div>
                </div>
                <div class="custom-field-wrap db-media-field-wrap">
                    <h4>Add image</h4>
                    <div class="upload-input">
                        <div class="form-group">
                          <span class="upload-btn">Upload a image</span>
                          <input class="form-contol" type="file" name="image">
                          @error('image')
                                    <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>      
</form>
<!-- End Page Content -->
@endsection