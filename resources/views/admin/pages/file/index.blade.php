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
                        <h1>Files</h1>
                        <a href="" class="btn btn-outline-primary mb-3">Add File</a>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @foreach($files as $file)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $file->name }}</td>--}}
{{--                                    <td>{{ $file->file }}</td>--}}
{{--                                    <td>--}}
{{--                                        <a class="btn btn-outline-primary" href="#">--}}
{{--                                            <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                                        </a>--}}
{{--                                        <button type="submit" class="btn btn-outline-danger">--}}
{{--                                            <i class="fa-solid fa-trash-can"></i>--}}
{{--                                        </button>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>File</th>
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
