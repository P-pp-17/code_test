<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | JJ </title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/backend.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/image-uploader.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/filter_multi_select.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/leaflet.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="height: auto;">
    <div class="wrapper">
        <!-- Navbar -->
        @include('backend.partials.commons._navbar')

        <!-- Main Sidebar Container -->
        @include('backend.partials.commons._sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- content -->
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('backend.partials.commons._bottom')
    </div>
    <script src="{{ asset('/js/leaflet.js') }}"></script>
    <script src="{{ asset('/js/backend.js') }}"></script>
    <script src="{{ asset('/js/image-uploader.min.js') }}"></script>
    <script src="{{ asset('/js/filter-multi-select-bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    @yield('js')
</body>

</html>
