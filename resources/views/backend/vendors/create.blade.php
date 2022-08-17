@extends('layouts.backend')
@section('title', 'Create Vendor')
@section('content')
@include('backend.partials.commons._content_header', ['title' => 'Create Vendor'])
<section class="content">
    <div class="card">
        <form action="{{ route('backend.vendors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                        name="name" placeholder="Enter Vendor Name" value="{{ old('name', '') }}">
                    @error('name')
                    <span id="name-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Phone <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                        name="phone" placeholder="Enter Vendor's Phone" value="{{ old('phone', '') }}">
                    @error('phone')
                    <span id="phone-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="address">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" placeholder="Enter Vendor Address" value="{{ old('address', '') }}">
                    @error('address')
                    <span id="address-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- <div class="form-group col-md-6">
                    <label for="image">Vendor Image <span class="text-danger">*</span></label>
                    <div id="react-image-upload" data-old-image-path="{{ old('image_path') ?? '' }}"
                        @error('image_path') data-required-error="{{ $message }}" @enderror data-preview-class="cover-image"></div>
                    <div class="text-warning mt-2">
                        <i class="fas fa-info-circle"></i>
                        <small>File size must be maximum 2 MB.</small>
                    </div>
                </div> -->

                <div class="form-group col-md-6">
                    <label for="image">Vendor Photo <span class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', '') }}">
                    @error('image')
                    <span id="attached-files-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="join-date">Join Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('join_date') is-invalid @enderror" id="join-date" name="join_date" value="{{ old('join_date', now()->format('Y-m-d')) }}">
                    @error('join_date')
                    <span id="join-date-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="permanent-date">Permanent Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('permanent_date') is-invalid @enderror" id="permanent-date" name="permanent_date" value="{{ old('permanent_date', now()->format('Y-m-d')) }}">
                    @error('permanent_date')
                    <span id="permanent-date-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="attached-files">Attached Files <span class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('attached_files') is-invalid @enderror" id="attached-files" name="attached_files[]" value="{{ old('attached_files', '') }}" multiple required>
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
                            <input type="radio" id="yes" name="is_active" value="1"  />
                            <label for="yes">Yes</label>
                        </div>
                        <div class="icheck-primary mr-2">
                            <input type="radio" id="no" name="is_active" value="0" checked />
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
@section('js')
@endsection

