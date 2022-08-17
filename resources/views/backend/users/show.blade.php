@extends('layouts.backend')
@section('title', $user->name)
@section('content')
@include('backend.partials.commons._content_header', ['title' => $user->name])
<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <table class="table no-border table-responsive">
                        <tr>
                            <td>Name:</td>
                            <td>{{ $user->name }}</td>
                        </tr>

                        <tr>
                            <td>Phone:</td>
                            <td>{{ $user->phone }}</td>
                        </tr>

                        <tr>
                            <td>Email:</td>
                            <td>{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <td>Register Source:</td>
                            <td>{{ $user->register_source }}</td>
                        </tr>
                    </table>

                    <h5 class="text-primary">Address</h5>
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <td>#</td>
                            <td>Address:</td>
                            <td>Address Phone:</td>
                            <td>Address Type:</td>
                            <td>Address Lat:</td>
                            <td>Address Lng:</td>
                            <td>Address Location Name:</td>
                        </tr>
                        
                        <?php $i=1; ?>
                        @foreach($userAddresses as $userAddress)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $userAddress->address }}</td>
                                <td>{{ $userAddress->phone }}</td>
                                <td>{{ $userAddress->type }}</td>
                                <td>{{ $userAddress->lat }}</td>
                                <td>{{ $userAddress->lng }}</td>
                                <td>{{ $userAddress->loc_name }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <table class="table no-border table-responsive">
                        <tr>
                            <td>Testing Status:</td>
                            <td>
                                @if($user->testing_status)
                                <span class="badge-btn bg-success">Yes</span>
                                @else
                                <span class="badge-btn bg-danger">No</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Active:</td>
                            <td>
                                @if($user->is_active)
                                <span class="badge-btn bg-success">Yes</span>
                                @else
                                <span class="badge-btn bg-danger">No</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Created at: </td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated at: </td>
                            <td>{{ $user->updated_at }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/user_images/'.$user->image)}}" alt="{{ $user->name }}" class="image">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-md-4 px-0">
                <a href="{{ route('backend.users.index') }}" class="btn btn-flat btn-primary">
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
