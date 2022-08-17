@extends('layouts.backend')
@section('title', 'Dashboard')
@section('css')

@endsection
@section('content')
@include('backend.partials.commons._content_header', ['title' => 'Dashboard'])
<section class="content">
	<div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- small box -->
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3>{{ $totalAdmins }}</h3>

                        <p>Admins</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-users"></i>
                    </div>
                    <a href="{{ route('backend.admins.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <!-- small box -->
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>{{ $totalUsers }}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-users"></i>
                    </div>
                    <a href="{{ route('backend.users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>{{ $totalVendors }}</h3>

                        <p>Vendors</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-users"></i>
                    </div>
                    <a href="{{ route('backend.vendors.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            {{--
            <div class="col-lg-3 col-md-6 col-12">
                <!-- small box -->
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>{{ $totalGalleries }}</h3>

                        <p>Galleries</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon far fa-images"></i>
                    </div>
                    <a href="{{ route('backend.galleries.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{ $totalStateAndDivisions }}</h3>

                        <p>State and Divisions</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa fa-location-arrow"></i>
                    </div>
                    <a href="{{ route('backend.state_and_divisions.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $totalTownships }}</h3>

                        <p>Townships</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa fa-map-pin"></i>
                    </div>
                    <a href="{{ route('backend.townships.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- small box -->
                <div class="small-box bg-olive">
                    <div class="inner">
                        <h3>{{ $totalBranchs }}</h3>

                        <p>Branches</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa fa-map-marker"></i>
                    </div>
                    <a href="{{ route('backend.branches.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            --}}
        </div>
    </div>
</section>
@endsection
@section('js')
@endsection