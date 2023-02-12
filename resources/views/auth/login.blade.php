<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5" style="min-width: 450px">
                            <div class="brand-logo">
                                <img src="../../assets/images/logo.svg">
                            </div>

                            <form class="pt-3" action="{{ url('/login') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        placeholder="Email" value="{{ old('email') }}" autocomplete="off">
                                </div>
                                @if ($errors->first('email'))
                                    <p class="text-danger"> {{ $errors->first('email') }}</p>
                                @endif
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        placeholder="Mật khẩu" autocomplete="off">
                                </div>
                                @if ($errors->first('password'))
                                    <p class="text-danger"> {{ $errors->first('password') }}</p>
                                @endif
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn text-capitalize">
                                        Đăng nhập
                                    </button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <label>
                                        <input type="checkbox">Ghi nhớ </label>
                                    <a href="#" class="auth-link text-black">Quên mật khẩu?</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Don't have an account? <a
                                        href="register.html" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
