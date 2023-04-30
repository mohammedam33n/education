<!DOCTYPE html>
<html lang="en">

<head>
    @if (LaravelLocalization::getCurrentLocale() == 'en')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>{{ __('globalWorld.AISHA Admin - Login Page') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('adminAssets/assets/img/favicon.ico') }}" />
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
        <link href="{{ asset('adminAssets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminAssets/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminAssets/assets/css/authentication/form-1.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css"
            href="{{ asset('adminAssets/assets/css/forms/theme-checkbox-radio.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/assets/css/forms/switches.css') }}">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> --}}
        <link href="{{ asset('adminAssets/plugins/font-icons/fontawesome/css/all.css') }}" rel="stylesheet"
            type="text/css" />
    @else
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>{{ __('globalWorld.AISHA Admin - Login Page') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('adminRtl/assets/img/favicon.ico') }}" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
        <link href="{{ asset('adminRtl/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminRtl/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminRtl/assets/css/authentication/form-1.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('adminRtl/assets/css/forms/theme-checkbox-radio.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('adminRtl/assets/css/forms/switches.css') }}">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> --}}
        <link href="{{ asset('adminAssets/plugins/font-icons/fontawesome/css/all.css') }}" rel="stylesheet"
            type="text/css" />
    @endif
</head>

<body class="form">
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <li class="nav-item dropdown language-dropdown more-dropdown">
                    <div class="dropdown custom-dropdown-icon">
                        <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                class="brand-name"><i class="fa-solid fa-globe"></i></span><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></a>
                        <div class="dropdown-menu dropdown-menu-right animated fadeInUp"
                            aria-labelledby="customDropdown">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" data-img-value="ca" data-value="en"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><img
                                        src="{{ asset('adminAssets/assets/img/ca.png') }}" class="flag-width"
                                        alt="flag alternate" hreflang="{{ $localeCode }}">
                                    {{ $properties['native'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                <div class="form-container">
                    <div class="form-content">
                        <h1 class="">{{ __('globalWorld.Log In to') }}<a href="index.html"><span
                                    class="brand-name">{{ __('globalWorld.AISHA') }}</span></a></h1>
                        <p class="signup-link"><a href="auth_register.html"></a></p>
                        <form class="text-left" method="POST" action="{{ route('admin.login') }}">
                            <div class="form">
                                @csrf
                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-at-sign">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="email" name="email" type="text" value=""
                                        placeholder="{{ __('globalWorld.Email') }}">
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11"
                                            rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="{{ __('globalWorld.Password') }}">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">{{ __('globalWorld.Show Password') }}</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary"
                                            value="">{{ __('globalWorld.Log In') }}</button>
                                    </div>
                                </div>
                                <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                            <input type="" class="new-control-input">
                                        </label>
                                    </div>
                                </div>

                                <div class="field-wrapper">
                                    <a href="auth_pass_recovery.html" class="forgot-pass-link"></a>
                                </div>

                            </div>
                        </form>
                        <p class="terms-conditions"> <a href="index.html"></a> <a href="javascript:void(0);">
                            </a><a href="javascript:void(0);"></a> <a href="javascript:void(0);"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>
    <script src="{{ asset('adminAssets/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('adminAssets/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('adminAssets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/js/authentication/form-1.js') }}"></script>
</body>
