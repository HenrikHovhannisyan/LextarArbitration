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
                                <th>Company Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Created date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partners as $user)
                                <tr>
                                    <td>{{ $user->company_name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @if($user->is_admin !== 1)
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Company Name</th>
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
