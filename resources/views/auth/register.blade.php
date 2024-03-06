@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <p class="registration_title">
                    Let's get started on <br>
                    creating your account.
                </p>
                <p class="have_account">
                    Have already an account?
                    <a href="{{route('login')}}">Sign in</a>.
                </p>
                <div class="sign_up_form">
                    <form id="multiStepForm" method="POST" action="{{ route('register') }}">
                    @csrf
                        <!-- Step 1 -->
                        <div class="form-step" id="step1">
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name *"
                                       required>
                                @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name *"
                                       required>
                                @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email *" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-check agree">
                                <input type="checkbox" name="agree" class="form-check-input" id="agree">
                                <label class="form-check-label" for="agree">
                                    I agree to the “Company”’s
                                    <a href="#">Terms Of Use</a>
                                    and
                                    <a href="#">Privacy Policy</a>.
                                </label>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="nextStep(1)">Next Step</button>
                        </div>
                        <!-- Step 2 -->
                        <div class="form-step d-none" id="step2">
                            <p class="sign_up_form_title">
                                Address Information
                            </p>
                            <div class="form-group">
                                <input type="text" name="country" class="form-control" placeholder="Country *" required>
                                @error('country')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Address Line 1 *"
                                       required>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="state" class="form-control" placeholder="Select a State *"
                                       required>
                                @error('state')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="city" class="form-control" placeholder="City" required>
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="zip" class="form-control" placeholder="Zip Code *"
                                               required>
                                        @error('zip')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <p class="sign_up_form_title">
                                Contact Information
                            </p>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Phone *" required>
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="fax" class="form-control" placeholder="Fax">
                                @error('fax')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-check authorize">
                                <input type="checkbox" name="authorize" class="form-check-input" id="authorize">
                                <label class="form-check-label" for="authorize">
                                    I authorize “Company” to use the information I have provided in this form <br>
                                    for purposes of marketing communications.
                                </label>
                            </div>
                            <div class="sign_up_btn_container">
                                <button type="button" class="btn btn-secondary" onclick="prevStep(2)">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                    Back
                                </button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next Step</button>
                            </div>
                        </div>
                        <!-- Step 3 -->
                        <div class="form-step d-none" id="step3">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Username *" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="position-relative">
                                    <input type="password" id="password" name="password" class="form-control"
                                           placeholder="Password *" required>
                                    <button type="button" class="sign_up_btn_eye" id="showPassword">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <button type="button" class="sign_up_btn_eye d-none" id="hidePassword">
                                        <i class="fa-regular fa-eye-slash"></i>
                                    </button>
                                </div>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="position-relative">
                                    <input type="password" id="confirm_password" name="password_confirmation"
                                           class="form-control" placeholder="Confirm Password *" required>
                                    <button type="button" class="sign_up_btn_eye" id="showConfirmPassword">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <button type="button" class="sign_up_btn_eye d-none" id="hideConfirmPassword">
                                        <i class="fa-regular fa-eye-slash"></i>
                                    </button>
                                </div>
                                @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="password_info">
                                <p>
                                    Password Requirements
                                </p>
                                <ul>
                                    <li>Minimum 8 characters</li>
                                    <li>Include at least one uppercase letter</li>
                                    <li>Include at least one number</li>
                                    <li>Include at least one special character</li>
                                </ul>
                            </div>
                            <div class="sign_up_btn_container">
                                <button type="button" class="btn btn-secondary" onclick="prevStep(3)">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                    Back
                                </button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


{{--    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
