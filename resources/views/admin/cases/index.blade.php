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
                                @if(Auth::user()->is_admin === 1)
                                    <th>Reactivate</th>
                                @endif
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
                                    <td class="@if($case->reactivate == 0) text-danger @else text-success @endif">{{ $case->number }}</td>
                                    @if(Auth::user()->is_admin === 1)
                                        <td>
                                            <form method="POST" action="{{ route('cases.reactivate', $case->id) }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="d-flex">
                                                    <select class="form-select role_select" name="reactivate">
                                                        <option value="1" @if($case->reactivate == 1) selected @endif>
                                                            Reactivate
                                                        </option>
                                                        <option value="0" @if($case->reactivate == 0) selected @endif>
                                                            Place on Hold
                                                        </option>
                                                    </select>

                                                    <button class="btn btn-success" type="submit">
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    @endif
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
                                @if(Auth::user()->is_admin === 1)
                                    <th>Reactivate</th>
                                @endif
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
