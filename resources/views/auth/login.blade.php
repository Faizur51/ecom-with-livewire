{{--
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
--}}

<x-app-layout>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> Login
            </div>
        </div>
    </div>
    <section class="pt-20 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-15">Login</h3>
                                    </div>
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email"  name="email"  value="{{old('email')}}" placeholder="Your Email">
                                        </div>
                                        <div class="form-group">
                                            <input  type="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                                    <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                </div>
                                            </div>
                                            @if (Route::has('password.request'))
                                            <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                            @endif
                                        </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">

                                                    <button type="submit" class="btn btn-fill-out btn-block hover-up btn-sm" name="login" style="width: 100%;background-color: #F57224" >Log in</button>
                                                    <span>Or,Login With</span>
                                                    <a href="{{ route('login.google') }}" class="btn btn-danger btn-block hover-up mt-5 btn-sm" style="width:100%;background-color: #D34836">Login with Google</a>
                                                    <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block hover-up mt-5 btn-sm" style="width:100%;background-color:#3B5998">Login with Facebook</a>
                                                </div>
                                            </div>
                                    </form>
                                    <div class="text-muted text-center">Already haven't an account? <a href="{{route('register')}}">Register now</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6">
                            <img src="{{asset('frontend')}}/assets/imgs/login.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</x-app-layout>
