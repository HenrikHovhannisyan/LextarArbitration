@extends('admin.layouts.app')

@section('content')
    <div id="wrapper">

        @include('admin.layouts.left-menu')

        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="btn btn-outline-primary" id="menu-toggle">
                <i class="fa-solid fa-bars"></i>
            </a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <h1>Rules & Forms</h1>
                        <a href="{{ route('files.create') }}" class="btn btn-outline-primary mb-3">
                            <i class="fa-solid fa-plus"></i>
                            Add File
                        </a>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Show</th>
                                <th>Rules</th>
                                <th>Forms</th>
                                <th>Fees</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td>{{ $file->name }}</td>
                                    <td>
                                        @if($file->show)
                                            <span class="text-success"><b>Yes</b></span>
                                        @else
                                            <span class="text-danger"><b>No</b></span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{asset($file->rules)}}" class="btn btn-outline-dark" target="_blank">
                                            Open Rules
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{asset($file->forms)}}" class="btn btn-outline-dark" target="_blank">
                                            Open Forms
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{asset($file->fees)}}" class="btn btn-outline-dark" target="_blank">
                                            Open Fees
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('files.destroy',$file->id) }}" method="POST">
                                            <a class="btn btn-outline-primary"
                                               href="{{ route('files.edit',$file->id) }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Show</th>
                                <th>Rules</th>
                                <th>Forms</th>
                                <th>Fees</th>
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
