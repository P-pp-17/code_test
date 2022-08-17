@extends('layouts.backend')
@section('title', 'Users')
@section('content')
@include('backend.partials.commons._content_header', ['title' => 'Users'])
@if(session()->has('success'))
<div id="swal" data-icon="success" data-title="Success!" data-message="{{ session('success') }}"></div>
@endif
<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-10 col-12">
                    <form action="{{ route('backend.users.search') }}" method="GET">
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
                                <a href="{{ route('backend.users.index') }}" class="btn btn-flat btn-info">
                                    <i class="fas fa-times"></i>
                                    <span>Cancel</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-12">
                    <a href="{{ route('backend.users.create') }}"
                        class="btn btn-flat btn-success mt-2 mt-md-0 float-md-right">
                        <i class="fas fa-plus"></i>
                        <span>Create User</span>
                    </a>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <p class="mb-0">
                        Showing <span class="font-weight-bold">{{ $users->firstItem() ?? 0 }}</span> to
                        <span class="font-weight-bold">{{ $users->lastItem() ?? 0 }}</span>
                        of
                        <span class="font-weight-bold">{{ $users->total() ?? 0 }}</span> entries
                    </p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @php
                        $itemNo = $users->firstItem();
                        @endphp
                        @if(isset($users) && count($users) > 0)
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $itemNo++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <input type="checkbox" class="boostrap-switch" name="is_active"
                                    @if($user->is_active
                                == 1) checked @endif data-id="{{ $user->id }}" data-type="users">
                            </td>
                            <td>
                                <a href="{{ route('backend.users.show', $user->id) }}"
                                    data-toggle="popover" data-content="View" class="text-primary mx-2">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('backend.users.edit', $user->id) }}"
                                    data-toggle="popover" data-content="Edit" class="text-gray mx-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <a href="javascript:void(0);" data-toggle="popover" data-content="Remove"
                                    class="remove text-danger mx-2" data-id="{{ $user->id }}"
                                    data-remove-content="{{ $user->name }}" data-type="users">
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
        @if($users->total() > 10)
        <div class="card-footer d-flex justify-content-center">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
