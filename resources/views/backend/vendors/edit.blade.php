@extends('layouts.backend')
@section('title', 'Edit '. $vendor->name)
@section('content')
@include('backend.partials.commons._content_header', ['title' => 'Edit '. $vendor->name])
<section class="content">
    <div class="card">
        <form action="{{ route('backend.vendors.update', $vendor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group col-md-6">
                    <div class="mb-0 alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        &nbsp;Attributes marked as <span class="text-danger">*</span> are required.
                    </div>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Enter Vendor Name" value="{{ old('name', $vendor->name) }}">
                    @error('name')
                    <span id="name-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Phone <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                        name="phone" placeholder="Enter Vendor's Phone" value="{{ old('phone', $vendor->phone) }}">
                    @error('phone')
                    <span id="phone-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="address">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" placeholder="Enter Vendor Address" value="{{ old('address', $vendor->address) }}">
                    @error('address')
                    <span id="address-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="image">Vendor Photo <span class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', '') }}">
                    <input type="hidden" name="hidden_image" value="{{ $vendor->image }}">
                    
                    <img src="{{ asset('images/vendor_images/'.$vendor->image)}}" class="img-thumbnail" width="75" />
                    
                    @error('image')
                    <span id="attached-files-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="join-date">Join Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('join_date') is-invalid @enderror" id="join-date" name="join_date" value="{{ old('join_date', $vendor->join_date) }}">
                    @error('join_date')
                    <span id="join-date-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="permanent-date">Permanent Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('permanent_date') is-invalid @enderror" id="permanent-date" name="permanent_date" value="{{ old('permanent_date', $vendor->permanent_date) }}">
                    @error('permanent_date')
                    <span id="permanent-date-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="attached-files">Attached Files <span class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('attached_files') is-invalid @enderror" id="attached-files" name="attached_files[]" value="{{ old('attached_files', '') }}" multiple>
                    <input type="hidden" name="hidden_attached_files" value="{{ $vendor->attached_files }}">
                    <?php 
                        $attached_files = json_decode($vendor->attached_files); 
                    ?>
                    @foreach($attached_files as $attached_file)
                        <img src="{{ asset('images/attached_files/'.$attached_file)}}" class="img-thumbnail" width="75" />
                    @endforeach
                    @error('attached_files')
                    <span id="attached-files-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="is-active">
                        Active
                        <span class="text-danger">*</span>
                    </label>
                    <div class="form-inline">
                        <div class="icheck-primary mr-2">
                            <input type="radio" id="yes" name="is_active" value="1" @if($vendor->is_active == 1) checked @endif />
                            <label for="yes">Yes</label>
                        </div>
                        <div class="icheck-primary mr-2">
                            <input type="radio" id="no" name="is_active" value="0" @if($vendor->is_active == 0) checked @endif/>
                            <label for="no">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-6 px-0 d-flex justify-content-between">
                    <a href="{{ route('backend.vendors.index') }}" class="btn btn-flat btn-primary">
                        <i class="fas fa-chevron-left"></i>
                        <span>Back</span>
                    </a>
                    <button type="submit" class="btn btn-flat btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
