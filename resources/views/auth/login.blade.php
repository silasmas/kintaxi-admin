@extends('layouts.guest', ['page_title' => __('miscellaneous.login_title2')])

@section('guest-content')

                                <h3 class="fw-bold text-center text-uppercase mt-3 mb-4">Administration</h3>

                                <form method="POST" action="{{ route('login') }}" class="pt-3">
    @csrf

                                    <!-- User name -->
                                    <div class="form-group mb-3">
                                        <label role="button" for="login_username" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.login_username')</label>
                                        <input type="text" name="login_username" id="login_username" class="form-control" placeholder="@lang('miscellaneous.login_username')" autofocus>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group mb-3">
                                        <label role="button" for="login_password" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.password.label')</label>
                                        <input type="password" name="login_password" id="login_password" class="form-control" placeholder="@lang('miscellaneous.password.label')">
                                    </div>

                                    <!-- Remember -->
                                    <div class="form-check form-check-flat form-check-primary d-flex justify-content-between my-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-check-input"> @lang('miscellaneous.remember_me') <i class="input-helper"></i>
                                        </label>
                                        <label>
                                            <a href="{{ route('password.request') }}" class="small text-decoration-underline">@lang('miscellaneous.forgotten_password')</a>
                                        </label>
                                    </div>

                                    <div class="mt-3 d-grid gap-2">
                                        <button type="submit" class="btn btn-warning rounded-pill py-3 shadow-0">@lang('auth.login')</button>
                                    </div>

    @empty($admins)
                                    <div class="text-center mt-4 fw-light">
                                        <a href="{{ route('register') }}" class="text-decoration-underline">@lang('miscellaneous.go_register')</a>
                                    </div>
    @endempty
                                </form>
@endsection