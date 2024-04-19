@extends('pages.manager.left-menu')

@section('title')
    Manager Dashboard
@endsection

@section('content')

    <main class="user-dashboard-main">
        <section>
            <div class="user-container">
                <div class="user-main-title-container">
                    <div class="left-side">
                        <h1 class="user-main-title">Manager Dashboard</h1>
                    </div>
                </div>
                <table class="dashboard-table">
                    <thead>
                    <tr>
                        <th scope="col">CASE NUMBER</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">CLAIMANT</th>
                        <th scope="col">RESPONDENT</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cases as $case)
                        <tr>
                            <td>{{$case->number}}</td>
                            <td class="text-capitalize">{{$case->status}}</td>
                            <td>{{$case->claimant}}</td>
                            <td>-</td>
                            <td>
                                <a href="{{ route('cases.show', $case->id) }}">
                                    <span>Case</span>
                                    <img src="../images/arrow-right-blue.png" class="table-right-arrow"
                                         alt="arrow right">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    </div>

@endsection
