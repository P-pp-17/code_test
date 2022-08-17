<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login | {{ config('app.name', 'Laravel')  }} </title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/backend.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

</head>

<body class="login-page" cz-shortcut-listen="true">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('backend.show_login_form') }}">
                JJ
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in</p>

                <form action="{{ route('backend.login') }}" method="post">
                    @csrf
                    @if(session()->has('invalidLogin'))
                    <div id="alert" class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('invalidLogin') }}
                    </div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control @error('email') ? is-invalid @enderror" placeholder="{{ __('messages.email') }}" value="{{ old('email') ?: '' }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span id="login-id-error" class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @error('password') ? is-invalid @enderror" placeholder="{{ __('messages.password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span id="password-error" class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('messages.login') }}
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <script src="{{ asset('/js/backend.js') }}"></script>
</body>

</html>
