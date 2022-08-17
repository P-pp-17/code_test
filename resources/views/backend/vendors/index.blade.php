@extends('layouts.backend')
@section('title', 'Vendors')
@section('content')
@include('backend.partials.commons._content_header', ['title' => 'Vendors'])
@if(session()->has('success'))
<div id="swal" data-icon="success" data-title="Success!" data-message="{{ session('success') }}"></div>
@endif
<section class="content">
    <div class="card">
        <div class="card-body">
             <div class="row mb-2">
                <div class="col-md-10 col-12">
                    <form action="{{ route('backend.vendors.search') }}" method="GET">
                        <div class="row">
                            <div class="col-12">
                                <label for="search">Search: </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search" name="keywords"
                                        value="{{ request()->query('keywords') ?? '' }}" placeholder="Enter Keywords">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-flat btn-primary mr-2">
                                    <i class="fas fa-search"></i>
                                    <span>Search</span>
                                </button>
                                <a href="{{ route('backend.vendors.index') }}" class="btn btn-flat btn-info">
                                    <i class="fas fa-times"></i>
                                    <span>Cancel</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-12">
                    <a href="{{ route('backend.vendors.create') }}"
                        class="btn btn-flat btn-success mt-2 mt-md-0 float-md-right">
                        <i class="fas fa-plus"></i>
                        <span>Create Vendor</span>
                    </a>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <p class="mb-0">
                        Showing <span class="font-weight-bold">{{ $vendors->firstItem() ?? 0 }}</span> to
                        <span class="font-weight-bold">{{ $vendors->lastItem() ?? 0 }}</span>
                        of
                        <span class="font-weight-bold">{{ $vendors->total() ?? 0 }}</span> entries
                    </p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @php
                        $itemNo = $vendors->firstItem();
                        @endphp
                        @if(isset($vendors) && count($vendors) > 0)
                        @foreach($vendors as $vendor)
                        <tr>
                            <td>{{ $itemNo++ }}</td>
                            <td>{{ $vendor->name }}</td>
                            <td>{{ $vendor->phone }}</td>
                            <td>{{ $vendor->address }}</td>
                            <td>
                                <input type="checkbox" class="boostrap-switch" name="is_active"
                                    @if($vendor->is_active
                                == 1) checked @endif data-id="{{ $vendor->id }}" data-type="vendors">
                            </td>
                            <td>
                                <a href="{{ route('backend.vendors.show', $vendor->id) }}"
                                    data-toggle="popover" data-content="View" class="text-primary mx-2">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('backend.vendors.edit', $vendor->id) }}"
                                    data-toggle="popover" data-content="Edit" class="text-gray mx-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);" data-toggle="popover" data-content="Remove"
                                    class="remove text-danger mx-2" data-id="{{ $vendor->id }}"
                                    data-remove-content="{{ $vendor->name }}" data-type="vendors">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">There is no item to display.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @if($vendors->total() > 10)
        <div class="card-footer d-flex justify-content-center">
            {{ $vendors->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
