@extends('admin.layouts.app')

@section('content')
    <div id="wrapper">

        @include('admin.layouts.left-menu')

        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="btn btn-outline-primary" id="menu-toggle">
                <i class="fa-solid fa-bars"></i>
            </a>
            <a href="{{route('rules.index')}}" class="btn btn-outline-primary">
                <i class="fa-solid fa-chevron-left"></i>
                Back
            </a>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <h1>Add Rules</h1>
                        <form method="POST" action="{{ route('rules.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6 mt-3 mb-3">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <h3>Files</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-md-4 mt-3">
                                        <label for="file">File:</label><br>
                                        <input type="file" class="form-control-file" id="file" name="file" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">
                                <i class="fa-solid fa-plus"></i>
                                Add
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
