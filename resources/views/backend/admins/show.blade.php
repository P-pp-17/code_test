@extends('layouts.backend')
@section('title', $admin->name)
@section('content')
@include('backend.partials.commons._content_header', ['title' => $admin->name])
<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td>Role:</td>
                                <td>{{ $admin->role->name }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $admin->email }}</td>
                            </tr>
                            <tr>
                                <td>Active:</td>
                                <td>
                                    @if($admin->is_active)
                                    <span class="badge-btn bg-success">Yes</span>
                                    @else
                                    <span class="badge-btn bg-danger">No</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Created at: </td>
                                <td>{{ $admin->created_at }}</td>
                            </tr>
                            <tr>
                                <td>Updated at: </td>
                                <td>{{ $admin->updated_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-md-4 px-0">
                <a href="{{ route('backend.admins.index') }}" class="btn btn-flat btn-primary">
                    <i class="fas fa-chevron-left"></i>
                    <span>Back</span>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
@endsection
