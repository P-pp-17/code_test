@extends('layouts.backend')
@section('title', 'Create Admin')
@section('content')
@include('backend.partials.commons._content_header', ['title' => 'Create Admin'])
<section class="content">
    <div class="card">
        <form action="{{ route('backend.admins.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group col-md-6">
                    <div class="mb-0 alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        &nbsp;Attributes marked as <span class="text-danger">*</span> are required.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="school">Role <span class="text-danger">*</span></label>
                    <select name="role_id" id="school" class="form-control js-select-2 @error('role_id') is-invalid @enderror"  data-selected="{{ old('role_id', 0) }}">
                        <option value="0">Select Role</option>
                        @if($roles->isNotEmpty())
                        @foreach($roles as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('role_id')
                    <span id="role_id-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Enter Admin Name" value="{{ old('name') ?? '' }}">
                    @error('name')
                    <span id="name-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Enter Admin Email" value="{{ old('email', '') }}">
                    @error('email')
                    <span id="email-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password <span class="text-danger">*</span> <a href="javascript:void(0);"
                            id="toggle-password"><small>Show
                                Password</small></a></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" name="password" placeholder="Enter Admin Password"
                        value="{{ old('password') ?? '' }}">
                    @error('password')
                    <span id="password-error" class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm-password">Confirm Password <span class="text-danger">*</span> 
                         <a href="javascript:void(0);" id="toggle-confirm-password"><small>Show
                                Password</small></a></label>
                    <input type="password"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="confirm-password" name="password_confirmation" placeholder="Enter Admin Confirm Password"
                        value="{{ old('password_confirmation') ?? '' }}">
                    @error('password_confirmation')
                    <span id="confirm-password-error" class="error invalid-feedback">
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
                            <input type="radio" id="yes" name="is_active" value="1" checked />
                            <label for="yes">Yes</label>
                        </div>
                        <div class="icheck-primary mr-2">
                            <input type="radio" id="no" name="is_active" value="0" />
                            <label for="no">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-6 px-0 d-flex justify-content-between">
                    <a href="{{ route('backend.admins.index') }}" class="btn btn-flat btn-primary">
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
