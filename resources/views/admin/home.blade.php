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
                        <h1 class="text-center">Admin Panel</h1>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                        <div class="border border-dark rounded p-3 bg-primary text-center shadow">
                            <i class="fa-solid fa-users fa-3x text-white fa-beat-fade"></i>
                            <h4 class="text-white mt-3 mb-3">
                                Users - <span>{{$userCount}}</span>
                            </h4>
                            <a href="{{ route('users.index') }}" class="btn btn-light">Go</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
