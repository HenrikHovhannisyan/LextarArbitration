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
                        <div class="bg-primary border border-dark rounded p-3 text-center shadow">
                            <i class="fa-solid fa-users fa-3x text-white fa-beat-fade"></i>
                            <h4 class="text-white mt-3 mb-3">
                                Users - <span>{{$userCount}}</span>
                            </h4>
                            <a href="{{ route('users.index') }}" class="btn btn-light">Go</a>
                        </div>
                    </div>
                    @if(auth()->user()->is_admin === 1)
                        <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                            <div class="bg-warning border border-dark rounded p-3 text-center shadow">
                                <i class="fa-solid fa-users fa-3x text-white fa-beat-fade"></i>
                                <h4 class="text-white mt-3 mb-3">
                                    Case Manager - <span>{{$caseManagerCount}}</span>
                                </h4>
                                <a href="{{ route('users.caseManager') }}" class="btn btn-light">Go</a>
                            </div>
                        </div>
                    @endif
                    <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                        <div class="bg-success border border-dark rounded p-3 text-center shadow">
                            <i class="fa-solid fa-file-pdf fa-3x text-white fa-beat-fade"></i>
                            <h4 class="text-white mt-3 mb-3">
                                Rules - <span>{{$rulesCount}}</span>
                            </h4>
                            <a href="{{ route('rules.index') }}" class="btn btn-light">Go</a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                        <div class="bg-danger border border-dark rounded p-3 text-center shadow">
                            <i class="fa-solid fa-file-pdf fa-3x text-white fa-beat-fade"></i>
                            <h4 class="text-white mt-3 mb-3">
                                Forms - <span>{{$formsCount}}</span>
                            </h4>
                            <a href="{{ route('forms.index') }}" class="btn btn-light">Go</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
