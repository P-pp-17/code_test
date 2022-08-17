@extends('layouts.backend')
@section('title', $vendor->name)
@section('content')
@include('backend.partials.commons._content_header', ['title' => $vendor->name])
<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <table class="table no-border table-responsive">
                        <tr>
                            <td>Name:</td>
                            <td>{{ $vendor->name }}</td>
                        </tr>

                        <tr>
                            <td>Phone:</td>
                            <td>{{ $vendor->phone }}</td>
                        </tr>

                        <tr>
                            <td>Address:</td>
                            <td>{{ $vendor->address }}</td>
                        </tr>

                        <!-- <tr>
                            <td>Photo:</td>
                            <td>
                                <img src="{{ asset('images/vendor_images/'.$vendor->image)}}" class="img-thumbnail" width="75" />
                            </td>
                        </tr> -->

                        <tr>
                            <td>Join Date:</td>
                            <td>{{ $vendor->join_date }}</td>
                        </tr>

                        <tr>
                            <td>Permanent Date:</td>
                            <td>{{ $vendor->permanent_date }}</td>
                        </tr>

                        <tr>
                            <td>Attached Files:</td>
                            <td>
                                <?php 
                                    $attached_files = json_decode($vendor->attached_files); 
                                ?>
                                @foreach($attached_files as $attached_file)
                                    <img src="{{ asset('images/attached_files/'.$attached_file)}}" class="img-thumbnail" width="75" />
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <td>Active:</td>
                            <td>
                                @if($vendor->is_active)
                                <span class="badge-btn bg-success">Yes</span>
                                @else
                                <span class="badge-btn bg-danger">No</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Created at: </td>
                            <td>{{ $vendor->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated at: </td>
                            <td>{{ $vendor->updated_at }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/vendor_images/'.$vendor->image)}}" alt="{{ $vendor->name }}" class="image">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-md-4 px-0">
                <a href="{{ route('backend.vendors.index') }}" class="btn btn-flat btn-primary">
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
