@extends('admin.layouts.app')

@section('content')
    <div id="wrapper">

        @include('admin.layouts.left-menu')

        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="btn btn-outline-primary" id="menu-toggle">
                <i class="fa-solid fa-bars"></i>
            </a>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <div class="d-flex align-items-center">
                            <h1>Partners</h1>

                            <a href="{{route('users.addPartner')}}" type="button" class="btn btn-primary ms-2">
                                <i class="fa-solid fa-plus"></i>
                                Add Partner
                            </a>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
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
                            @foreach($partners as $user)
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
                                                        <option value="3" @if($user->is_admin == 3) selected @endif>
                                                            Case Manager
                                                        </option>
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
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @if($user->is_admin !== 1)
                                            <button type="submit" class="btn btn-outline-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
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
@endsection

@section('script')
    <script>
        new DataTable('#example');
    </script>
@endsection
