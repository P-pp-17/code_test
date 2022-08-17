@extends('layouts.backend')
@section('title', 'Admins')
@section('content')
@include('backend.partials.commons._content_header', ['title' => 'Admins'])
@if(session()->has('success'))
<div id="swal" data-icon="success" data-title="Success!" data-message="{{ session('success') }}"></div>
@endif
<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-10 col-12">
                    <form action="{{ route('backend.admins.search') }}" method="GET">
                        <div class="row">
                            <div class="col-12">
                                <label for="search">Search: </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search" name="keywords"
                                        value="{{ request()->query('keywords') ?? ''}}" placeholder="Enter Keywords">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-flat btn-primary mr-2">
                                    <i class="fas fa-search"></i>
                                    <span>Search</span>
                                </button>
                                <a href="{{ route('backend.admins.index') }}" class="btn btn-flat btn-info">
                                    <i class="fas fa-times"></i>
                                    <span>Cancel</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-12">
                    <a href="{{ route('backend.admins.create') }}"
                        class="btn btn-flat btn-success mt-2 mt-md-0 float-md-right">
                        <i class="fas fa-plus"></i>
                        <span>Create Admin</span>
                    </a>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <p class="mb-0">
                        Showing <span class="font-weight-bold">{{ $admins->firstItem() ?? 0 }}</span> to
                        <span class="font-weight-bold">{{ $admins->lastItem() ?? 0 }}</span>
                        of
                        <span class="font-weight-bold">{{ $admins->total() ?? 0 }}</span> entries
                    </p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @php
                        $itemNo = $admins->firstItem();
                        @endphp
                        @if(isset($admins) && count($admins) > 0)
                        @foreach($admins as $admin)
                        <tr>
                            <td>{{ $itemNo++ }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <input type="checkbox" class="boostrap-switch" name="is_active"
                                    @if($admin->is_active
                                == 1) checked @endif data-id="{{ $admin->id }}" data-type="admins">
                            </td>
                            <td>
                                <a href="{{ route('backend.admins.show', $admin->id) }}"
                                    data-toggle="popover" data-content="View" class="text-primary mx-2">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('backend.admins.edit', $admin->id) }}"
                                    data-toggle="popover" data-content="Edit" class="text-gray mx-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);" data-toggle="popover" data-content="Remove"
                                    class="remove text-danger mx-2" data-id="{{ $admin->id }}"
                                    data-remove-content="{{ $admin->name }}" data-type="admins">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center">There is no item to display.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @if($admins->total() > 10)
        <div class="card-footer d-flex justify-content-center">
            {{ $admins->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
