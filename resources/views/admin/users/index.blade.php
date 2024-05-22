@extends('admin.layouts.app')

@section('content')
    <div id="wrapper">

        @include('admin.layouts.left-menu')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="btn btn-outline-primary" id="menu-toggle">
                <i class="fa-solid fa-bars"></i>
            </a>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <h1>Users</h1>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="table-responsive pb-3">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Created date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td class="d-flex justify-content-between align-items-center">
                                            @if($user->is_admin === 1 )
                                                <span class="text-danger">Super Admin</span>
                                            @elseif($user->is_admin === 2)
                                                <span class="text-warning">Admin</span>
                                            @elseif($user->is_admin === 3)
                                                <span class="text-info">Case Manager</span>
                                            @else
                                                <span class="text-success">User</span>
                                            @endif
                                            @if($user->is_admin !== 1)
                                                <form method="POST"
                                                      action="{{ route('users.updateRole', ['user' => $user]) }}">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="d-flex">
                                                        <select class="form-select role_select" name="role">
                                                            <option value="2" @if($user->is_admin == 2) selected @endif>
                                                                Admin
                                                            </option>
                                                            @if(auth()->user()->is_admin === 1)
                                                                <option value="3"
                                                                        @if($user->is_admin == 3) selected @endif>
                                                                    Case Manager
                                                                </option>
                                                            @endif
                                                            <option value="0" @if($user->is_admin == 0) selected @endif>
                                                                User
                                                            </option>
                                                        </select>

                                                        <button class="btn btn-success" type="submit">
                                                            <i class="fa-solid fa-check"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            @endif
                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td style="font-size: 14px">{{ $user->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            @if($user->is_admin !== 1)
                                                <div class="d-flex gap-1">
                                                    <button type="button" class="btn btn-outline-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit_profile_{{ $user->id }}">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="edit_profile_{{ $user->id }}"
                                                         tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-bottom-0">
                                                                    <button type="button"
                                                                            class="btn-close border border-dark rounded-circle"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h2 class="edit_profile_title">Edit Personal Info</h2>
                                                                    <form method="POST"
                                                                          action="{{ route('users.update', ['user' => $user->id]) }}"
                                                                          enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="account_form">
                                                                            <div>
                                                                                <p class="account_form_title">Personal
                                                                                    Details</p>
                                                                                <hr>
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-6 mb-2">
                                                                                        <div class="form-group">
                                                                                            <label for="first_name"
                                                                                                   class="form-label">First
                                                                                                name
                                                                                                *</label>
                                                                                            <input type="text"
                                                                                                   name="first_name"
                                                                                                   id="first_name"
                                                                                                   class="form-control "
                                                                                                   placeholder="First name *"
                                                                                                   value="{{ old('first_name', $user->first_name) }}"
                                                                                                   required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-6 mb-2">
                                                                                        <div class="form-group">
                                                                                            <label for="last_name"
                                                                                                   class="form-label">Last
                                                                                                name
                                                                                                *</label>
                                                                                            <input type="text"
                                                                                                   name="last_name"
                                                                                                   id="last_name"
                                                                                                   class="form-control "
                                                                                                   placeholder="Last name *"
                                                                                                   value="{{ old('last_name', $user->last_name) }}"
                                                                                                   required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-6 mb-2">
                                                                                        <div class="form-group">
                                                                                            <label for="name"
                                                                                                   class="form-label">User
                                                                                                name *</label>
                                                                                            <input type="text"
                                                                                                   name="name" id="name"
                                                                                                   class="form-control "
                                                                                                   placeholder="User name *"
                                                                                                   value="{{ old('name', $user->name) }}"
                                                                                                   required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-6 mb-2">
                                                                                        <div class="form-group">
                                                                                            <label for="email"
                                                                                                   class="form-label">Email
                                                                                                *</label>
                                                                                            <input type="email"
                                                                                                   name="email"
                                                                                                   id="email"
                                                                                                   class="form-control "
                                                                                                   placeholder="Email *"
                                                                                                   value="{{ old('email', $user->email) }}"
                                                                                                   required>
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
                                                                                    <label for="country"
                                                                                           class="form-label">Country
                                                                                        *</label>
                                                                                    <input type="text" name="country"
                                                                                           id="country"
                                                                                           class="form-control "
                                                                                           placeholder="Country *"
                                                                                           value="{{ old('country', $user->country) }}"
                                                                                           required="">
                                                                                </div>
                                                                                <div class="form-group mb-2">
                                                                                    <label for="address"
                                                                                           class="form-label">Address
                                                                                        *</label>
                                                                                    <input type="text" name="address"
                                                                                           id="address"
                                                                                           class="form-control "
                                                                                           placeholder="Address *"
                                                                                           value="{{ old('address', $user->address) }}"
                                                                                           required="">
                                                                                </div>
                                                                                <div class="form-group mb-2">
                                                                                    <label for="state"
                                                                                           class="form-label">Select a
                                                                                        State *</label>
                                                                                    <input type="text" name="state"
                                                                                           id="state"
                                                                                           class="form-control "
                                                                                           placeholder="Select a State *"
                                                                                           value="{{ old('state', $user->state) }}"
                                                                                           required="">
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-6">
                                                                                        <div class="form-group mb-2">
                                                                                            <label for="city"
                                                                                                   class="form-label">City
                                                                                                *</label>
                                                                                            <input type="text"
                                                                                                   name="city" id="city"
                                                                                                   class="form-control "
                                                                                                   placeholder="City"
                                                                                                   value="{{ old('city', $user->city) }}"
                                                                                                   required="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-6">
                                                                                        <div class="form-group mb-2">
                                                                                            <label for="zip"
                                                                                                   class="form-label">Zip
                                                                                                Code *</label>
                                                                                            <input type="text"
                                                                                                   name="zip" id="zip"
                                                                                                   class="form-control "
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
                                                                                    <label for="phone"
                                                                                           class="form-label">Phone
                                                                                        *</label>
                                                                                    <input type="text" name="phone"
                                                                                           id="phone"
                                                                                           class="form-control "
                                                                                           placeholder="Phone *"
                                                                                           value="{{ old('phone', $user->phone) }}"
                                                                                           required="">
                                                                                </div>
                                                                                <div class="form-group mb-2">
                                                                                    <label for="fax" class="form-label">Fax</label>
                                                                                    <input type="text" name="fax"
                                                                                           id="fax"
                                                                                           class="form-control "
                                                                                           placeholder="Fax"
                                                                                           value="{{ old('fax', $user->fax) }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-5">
                                                                                <p class="account_form_title">
                                                                                    Change Password
                                                                                </p>
                                                                                <hr>
                                                                                <div class="form-group mb-2">
                                                                                    <label for="password"
                                                                                           class="form-label">New
                                                                                        Password *</label>
                                                                                    <div class="position-relative">
                                                                                        <input type="password"
                                                                                               id="password"
                                                                                               name="password"
                                                                                               class="form-control "
                                                                                               placeholder="New Password *"
                                                                                        >
                                                                                        <button type="button"
                                                                                                class="sign_up_btn_eye"
                                                                                                id="showPassword">
                                                                                            <i class="fa-regular fa-eye"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="sign_up_btn_eye d-none"
                                                                                                id="hidePassword">
                                                                                            <i class="fa-regular fa-eye-slash"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group mb-2">
                                                                                    <label for="confirm_password"
                                                                                           class="form-label">Confirm
                                                                                        New
                                                                                        Password *</label>
                                                                                    <div class="position-relative">
                                                                                        <input type="password"
                                                                                               id="confirm_password"
                                                                                               name="password_confirmation"
                                                                                               class="form-control "
                                                                                               placeholder="Confirm New Password *">
                                                                                        <button type="button"
                                                                                                class="sign_up_btn_eye"
                                                                                                id="showConfirmPassword">
                                                                                            <i class="fa-regular fa-eye"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="sign_up_btn_eye d-none"
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
                                                                                        <li>Include at least one
                                                                                            uppercase letter
                                                                                        </li>
                                                                                        <li>Include at least one
                                                                                            number
                                                                                        </li>
                                                                                        <li>Include at least one special
                                                                                            character
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="w-100 text-center mt-3">
                                                                            <button type="submit"
                                                                                    class="btn btn-primary rounded-0">
                                                                                Update
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="{{ route('users.destroy', $user->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Created date</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        new DataTable('#example');
    </script>
@endsection
