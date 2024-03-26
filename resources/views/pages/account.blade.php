@extends('layouts.left-menu')

@section('title')
    Account
@endsection

@section('content')

    <main class="user-dashboard-main">
        <section>
            @if(session('success'))
                <div class="modal fade" id="success-messages" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <button type="button" class="btn-close border border-dark rounded-circle" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{asset('img/success-messages.png')}}" alt="Logo" style="width: 160px;">
                                <p class="mt-3">{{ session('success') }}</p>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-primary m-auto" data-bs-dismiss="modal"
                                        aria-label="Close">Go to Home
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="user-container">
                <div class="user-main-title-container">
                    <a href="{{route('cases.index')}}" class="case-number"><img src="{{asset('images/back-icon.png')}}"
                                                                                alt="back icon"></a>
                    <div class="left-side">
                        <h1 class="user-main-title">Account</h1>
                        <span class="paragraph">User Information</span>
                    </div>
                </div>
                <div class="w-100 bg-white p-3 shadow-sm rounded">
                    <div class="mb-3">
                        <span style="width: 150px;display: inline-block;">First name:</span>
                        <span class="">{{$user->first_name}}</span>
                    </div>
                    <div class="mb-3">
                        <span style="width: 150px;display: inline-block;">Last name:</span>
                        <span class="">{{$user->last_name}}</span>
                    </div>
                    <div class="mb-3">
                        <span style="width: 150px;display: inline-block;">Email:</span>
                        <span class="">{{$user->email}}</span>
                    </div>
                    <div class="mb-3">
                        <span style="width: 150px;display: inline-block;">Country:</span>
                        <span class="">{{$user->country}}</span>
                    </div>
                    <div class="mb-3">
                        <span style="width: 150px;display: inline-block;">Address:</span>
                        <span class=""> {{$user->address}}, {{$user->city}}, {{$user->state}}</span>
                    </div>
                    <div class="mb-3">
                        <span style="width: 150px;display: inline-block;">Phone:</span>
                        <span class="">{{$user->phone}}</span>
                    </div>
                    <div class="mb-3">
                        <span style="width: 150px;display: inline-block;">Fax:</span>
                        <span class="">{{$user->fax}}</span>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_profile">
                        <i class="fa-regular fa-pen-to-square"></i>
                        Edit Personal Info
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="edit_profile" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <button type="button" class="btn-close border border-dark rounded-circle"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="edit_profile_title">Edit Personal Info</p>
                                    <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="account_form">
                                            <div>
                                                <p class="account_form_title">Personal Details</p>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mb-2">
                                                        <div class="form-group">
                                                            <label for="first_name" class="form-label">First name
                                                                *</label>
                                                            <input type="text" name="first_name" id="first_name"
                                                                   class="form-control " placeholder="First name *"
                                                                   value="{{ old('first_name', $user->first_name) }}"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-2">
                                                        <div class="form-group">
                                                            <label for="last_name" class="form-label">Last name
                                                                *</label>
                                                            <input type="text" name="last_name" id="last_name"
                                                                   class="form-control " placeholder="Last name *"
                                                                   value="{{ old('last_name', $user->last_name) }}"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-2">
                                                        <div class="form-group">
                                                            <label for="name" class="form-label">User name *</label>
                                                            <input type="text" name="name" id="name"
                                                                   class="form-control " placeholder="User name *"
                                                                   value="{{ old('name', $user->name) }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-2">
                                                        <div class="form-group">
                                                            <label for="email" class="form-label">Email *</label>
                                                            <input type="email" name="email" id="email"
                                                                   class="form-control " placeholder="Email *"
                                                                   value="{{ old('email', $user->email) }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                <p class="account_form_title">
                                                    Address Information
                                                </p>
                                                <hr>
                                                <div class="form-group mb-2">
                                                    <label for="country" class="form-label">Country *</label>
                                                    <input type="text" name="country" id="country" class="form-control "
                                                           placeholder="Country *"
                                                           value="{{ old('country', $user->country) }}"
                                                           required="">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="address" class="form-label">Address *</label>
                                                    <input type="text" name="address" id="address" class="form-control "
                                                           placeholder="Address *"
                                                           value="{{ old('address', $user->address) }}"
                                                           required="">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="state" class="form-label">Select a State *</label>
                                                    <input type="text" name="state" id="state" class="form-control "
                                                           placeholder="Select a State *"
                                                           value="{{ old('state', $user->state) }}"
                                                           required="">
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group mb-2">
                                                            <label for="city" class="form-label">City *</label>
                                                            <input type="text" name="city" id="city"
                                                                   class="form-control " placeholder="City"
                                                                   value="{{ old('city', $user->city) }}" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group mb-2">
                                                            <label for="zip" class="form-label">Zip Code *</label>
                                                            <input type="text" name="zip" id="zip" class="form-control "
                                                                   placeholder="Zip Code *"
                                                                   value="{{ old('zip', $user->zip) }}"
                                                                   required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                <p class="account_form_title">
                                                    Contact Information
                                                </p>
                                                <hr>
                                                <div class="form-group mb-2">
                                                    <label for="phone" class="form-label">Phone *</label>
                                                    <input type="text" name="phone" id="phone" class="form-control "
                                                           placeholder="Phone *"
                                                           value="{{ old('phone', $user->phone) }}" required="">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="fax" class="form-label">Fax</label>
                                                    <input type="text" name="fax" id="fax" class="form-control "
                                                           placeholder="Fax" value="{{ old('fax', $user->fax) }}">
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                <p class="account_form_title">
                                                    Change Password
                                                </p>
                                                <hr>
{{--                                                <div class="form-group mb-2">--}}
{{--                                                    <label for="current_password" class="form-label">Current Password--}}
{{--                                                        *</label>--}}
{{--                                                    <input type="text" name="current_password" id="current_password"--}}
{{--                                                           class="form-control" placeholder="Current Password *"--}}
{{--                                                           value="">--}}
{{--                                                </div>--}}
                                                <div class="form-group mb-2">
                                                    <label for="password" class="form-label">New Password *</label>
                                                    <div class="position-relative">
                                                        <input type="password" id="password" name="password"
                                                               class="form-control " placeholder="New Password *"
                                                        >
                                                        <button type="button" class="sign_up_btn_eye" id="showPassword">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="sign_up_btn_eye d-none"
                                                                id="hidePassword">
                                                            <i class="fa-regular fa-eye-slash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="confirm_password" class="form-label">Confirm New
                                                        Password *</label>
                                                    <div class="position-relative">
                                                        <input type="password" id="confirm_password"
                                                               name="password_confirmation" class="form-control "
                                                               placeholder="Confirm New Password *">
                                                        <button type="button" class="sign_up_btn_eye"
                                                                id="showConfirmPassword">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="sign_up_btn_eye d-none"
                                                                id="hideConfirmPassword">
                                                            <i class="fa-regular fa-eye-slash"></i>
                                                        </button>
                                                    </div>
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
                                            </div>
                                        </div>
                                        <div class="w-100 text-center mt-3">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    </div>

@endsection
