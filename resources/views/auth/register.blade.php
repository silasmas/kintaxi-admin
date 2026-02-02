@extends('layouts.guest', ['page_title' => __('miscellaneous.register_title1')])

@section('guest-content')

                                <h3 class="fw-bold text-center text-uppercase mt-3 mb-4">Administration</h3>

                                <form method="POST" action="{{ route('register') }}" class="pt-3">
    @csrf

                                    <div class="row g-3">
                                        <!-- First name -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_firstname" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.firstname')</label>
                                                <input type="text" name="register_firstname" id="register_firstname" class="form-control" placeholder="@lang('miscellaneous.firstname')" autofocus>
                                            </div>
                                        </div>

                                        <!-- Last name -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_lastname" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.lastname')</label>
                                                <input type="text" name="register_lastname" id="register_lastname" class="form-control" placeholder="@lang('miscellaneous.lastname')">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <!-- Surname -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_surname" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.surname')</label>
                                                <input type="text" name="register_surname" id="register_surname" class="form-control" placeholder="@lang('miscellaneous.surname')">
                                            </div>
                                        </div>

                                        <!-- User name -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_username" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.username')</label>
                                                <input type="text" name="register_username" id="register_username" class="form-control" placeholder="@lang('miscellaneous.username')">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <!-- Birth date -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="birthdate" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.birth_date.label')</label>
                                                <input type="text" name="register_birthdate" id="birthdate" class="form-control" placeholder="@lang('miscellaneous.birth_date.label')">
                                            </div>
                                        </div>

                                        <!-- Gender -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="register_gender">@lang('miscellaneous.gender_title')</label>
                                                <select name="register_gender" id="register_gender" class="form-select">
                                                    <option value="M">@lang('miscellaneous.gender1')</option>
                                                    <option value="F">@lang('miscellaneous.gender2')</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <!-- Phone -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_phone" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.phone')</label>
                                                <input type="text" name="register_phone" id="register_phone" class="form-control" placeholder="@lang('miscellaneous.phone')">
                                            </div>
                                        </div>

                                        <!-- E-mail -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_email" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.email')</label>
                                                <input type="text" name="register_email" id="register_email" class="form-control" placeholder="@lang('miscellaneous.email')">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <!-- Password -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="register_password" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.password.label')</label>
                                                <input type="password" name="register_password" id="register_password" class="form-control" placeholder="@lang('miscellaneous.password.label')">
                                            </div>
                                        </div>

                                        <!-- Confirm password -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label role="button" for="confirm_password" class="form-label d-lg-inline-block d-none">@lang('miscellaneous.confirm_password.label')</label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="@lang('miscellaneous.confirm_password.label')">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3 d-grid gap-2">
                                        <button type="submit" class="btn btn-block btn-success btn-lg fw-medium auth-form-btn">@lang('auth.register')</button>
                                    </div>

                                    <div class="text-center mt-4 fw-light">
                                        <a href="{{ route('login') }}" class="text-decoration-underline">@lang('miscellaneous.go_login')</a>
                                    </div>
                                </form>

@endsection