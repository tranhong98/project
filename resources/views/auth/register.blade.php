<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"/>
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="../../assets/images/logo.svg">
                        </div>
                        <h6 class="font-weight-light">Sign up to continue.</h6>
                        <form class="pt-3" action="{{ url('/register') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg"
                                       placeholder="Email"/>
                                @if ($errors->has('email'))
                                    {{ $errors->first('email') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg"
                                       placeholder="Password"/>
                                @if ($errors->has('password'))
                                    {{ $errors->first('password') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm password" class="form-control form-control-lg"
                                       placeholder="Confirm Password"/>
                            </div>
                            <div class="mt-3">
                                <button type="submit"
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                    SIGN UP
                                </button>
                            </div>
                            <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                                <label>
                                    <input type="checkbox"> Keep me signed in </label>
                                <a href="#" class="auth-link text-black">Forgot password?</a>
                            </div>
                            <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
