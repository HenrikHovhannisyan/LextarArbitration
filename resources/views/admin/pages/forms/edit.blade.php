@extends('admin.layouts.app')

@section('content')
    <div id="wrapper">

        @include('admin.layouts.left-menu')

        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="btn btn-outline-primary" id="menu-toggle">
                <i class="fa-solid fa-bars"></i>
            </a>
            <a href="{{ route('forms.index') }}" class="btn btn-outline-primary">
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
                        <h1>Edit Rules</h1>
                        <form method="POST" action="{{ route('forms.update', $form->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ $form->name }}" required>
                                </div>
                                <div class="col-12 col-md-6 mt-3">
                                    <label for="show1">Show:</label>
                                    <select class="form-control" id="show1" name="show">
                                        <option value="1" @if($form->show === 1)
                                        selected
                                            @endif
                                        >Yes
                                        </option>
                                        <option value="0" @if($form->show === 0)
                                        selected
                                            @endif
                                        >No
                                        </option>
                                    </select>
                                </div>
                                <h3>Files</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-md-4 mt-3">
                                        <label for="file">Rules:</label><br>
                                        <input type="file" class="form-control-file" id="file" name="file">
                                        <br>
                                        <a href="{{asset($form->file)}}" class="btn btn-outline-dark mt-3"
                                           target="_blank">
                                            Open File
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">
                                <i class="fa-solid fa-save"></i>
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
