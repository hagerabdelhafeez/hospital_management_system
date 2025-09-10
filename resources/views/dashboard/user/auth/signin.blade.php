@extends('dashboard.layouts.master2')
@section('css')
    <style>
        .login-form {
            display: none;
        }
    </style>
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('dashboard/img/media/login.png') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'index')) }}"><img
                                                src="{{ URL::asset('dashboard/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            {{-- <x-auth-session-status class="mb-4" status="{{ session('status') }}" /> --}}
                                            <h2>{{ __('dashboard/login.welcome_back') }}</h2>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="chooseUser">{{ __('dashboard/login.Select_Enter') }}</label>
                                                <select class="form-control" id="chooseUser">
                                                    <option value="" selected disabled>
                                                        {{ __('dashboard/login.Choose_list') }}</option>
                                                    <option value="user">{{ __('dashboard/login.user') }}</option>
                                                    <option value="admin">{{ __('dashboard/login.admin') }}</option>
                                                    <option value="doctor">الدخول كدكتور</option>
                                                    <option value="ray_employee">الدخول كموظف اشعة</option>
                                                    <option value="laboratorie_employee">الدخول كموظف مختبر</option>
                                                </select>
                                            </div>

                                            {{-- User Form --}}
                                            <div class="login-form" id="user">
                                                <h5 class="font-weight-semibold mb-4">{{ __('dashboard/login.user') }}</h5>
                                                <form method="POST" action="{{ route('patient.login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" name="email"
                                                            value="{{ old('email') }}" placeholder="Enter your email"
                                                            type="email" required autofocus>
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control" name="password"
                                                            placeholder="Enter your password" type="password" required
                                                            autocomplete="current-password">
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">Sign
                                                        In</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create
                                                            an Account</a></p>
                                                </div>
                                            </div>

                                            {{-- Admin Form --}}
                                            <div class="login-form" id="admin">
                                                <h5 class="font-weight-semibold mb-4">{{ __('dashboard/login.admin') }}
                                                </h5>
                                                <form method="POST" action="{{ route('admin.login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" name="email"
                                                            value="{{ old('email') }}" placeholder="Enter your email"
                                                            type="email" required autofocus>
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control" name="password"
                                                            placeholder="Enter your password" type="password" required
                                                            autocomplete="current-password">
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">Sign
                                                        In</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create
                                                            an Account</a></p>
                                                </div>
                                            </div>


                                            {{-- Doctor Form --}}
                                            <div class="login-form" id="doctor">
                                                <h5 class="font-weight-semibold mb-4">الدخول دكتور
                                                </h5>
                                                <form method="POST" action="{{ route('doctor.login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" name="email"
                                                            value="{{ old('email') }}" placeholder="Enter your email"
                                                            type="email" required autofocus>
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control" name="password"
                                                            placeholder="Enter your password" type="password" required
                                                            autocomplete="current-password">
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">Sign
                                                        In</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i
                                                                    class="fab fa-facebook-f"></i>
                                                                Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with
                                                                Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create
                                                            an Account</a></p>
                                                </div>
                                            </div>


                                            {{-- Ray Employee Form --}}
                                            <div class="login-form" id="ray_employee">
                                                <h5 class="font-weight-semibold mb-4">الدخول كموظف اشعة
                                                </h5>
                                                <form method="POST" action="{{ route('ray_employee.login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" name="email"
                                                            value="{{ old('email') }}" placeholder="Enter your email"
                                                            type="email" required autofocus>
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control" name="password"
                                                            placeholder="Enter your password" type="password" required
                                                            autocomplete="current-password">
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">Sign
                                                        In</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i
                                                                    class="fab fa-facebook-f"></i>
                                                                Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with
                                                                Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create
                                                            an Account</a></p>
                                                </div>
                                            </div>

                                            {{-- Laboratorie Employee Form --}}
                                            <div class="login-form" id="laboratorie_employee">
                                                <h5 class="font-weight-semibold mb-4">الدخول كموظف مختبر
                                                </h5>
                                                <form method="POST" action="{{ route('laboratorie_employee.login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" name="email"
                                                            value="{{ old('email') }}" placeholder="Enter your email"
                                                            type="email" required autofocus>
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control" name="password"
                                                            placeholder="Enter your password" type="password" required
                                                            autocomplete="current-password">
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">Sign
                                                        In</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i
                                                                    class="fab fa-facebook-f"></i>
                                                                Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with
                                                                Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create
                                                            an Account</a></p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#chooseUser').change(function() {
            var myId = $(this).val();
            $('.login-form').each(function() {
                myId === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
