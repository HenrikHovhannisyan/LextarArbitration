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
                        <h1>Cases</h1>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Number</th>
                                <th>Status</th>
                                <th>Claimant</th>
                                <th>Respondent</th>
                                <th>Arbitrator</th>
                                <th>Partner</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cases as $case)
                                <tr>
                                    <td>{{ $case->number }}</td>
                                    <td>{{ $case->status }}</td>
                                    <td>{{ $case->claimant }}</td>
                                    <td>{{ $case->respondent }}</td>
                                    <td>{{ $case->arbitrator }}</td>
                                    <td>
                                        @foreach($partners as $partner)
                                            @if($partner->id == $case->partner)
                                                {{ $partner->company_name }}
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Number</th>
                                <th>Status</th>
                                <th>Claimant</th>
                                <th>Respondent</th>
                                <th>Arbitrator</th>
                                <th>Partner</th>
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
