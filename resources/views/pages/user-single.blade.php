@extends('layouts.left-menu')

@section('title')
    User Dashboard
@endsection

@section('content')

    <main class="user-dashboard-main">
        <section>
            <div class="user-container">
                <div class="user-main-title-container">
                    <a href="{{route('cases.index')}}" class="case-number"><img src="../images/back-icon.png" alt="back icon"></a>
                    <div class="left-side">
                        <h1 class="user-main-title">CASE-123456</h1>
                        <span class="paragraph">Case Overview & Details</span>
                    </div>
                </div>
                <table class="dashboard-table">
                    <thead>
                    <tr>
                        <th scope="col">STATUS</th>
                        <th scope="col">CLAIMANT</th>
                        <th scope="col">Respondent</th>
                        <th scope="col">Arbitrator</th>
                        <th scope="col">Partner</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-capitalize">{{$case->status}}</th>
                        <td>{{$case->claimant}}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    </tbody>
                </table>
                <div class="single-case-tables">
                    <div class="upcoming-events">
                        <h2>Upcoming Events</h2>
                        <table class="dashboard-table">
                            <thead>
                            <tr>
                                <th scope="col">Event Type</th>
                                <th scope="col">CASE NUMBER</th>
                                <th scope="col">PURPOSE</th>
                                <th scope="col">Date/Time</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Hearing</th>
                                <td>CASE-123456</td>
                                <td>Discovery</td>
                                <td>2024-01-20 </td>
                                <td>
                                    <a href="">
                                        Join
                                        <img src="../images/arrow-right-blue.png" class="table-right-arrow" alt="arrow right">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Conference</th>
                                <td>CASE-789012</td>
                                <td>Settlement</td>
                                <td>2024-01-25</td>
                                <td>
                                    <a href="" class="disabled">
                                        Join
                                        <img src="../images/arrow-right-blue.png" class="table-right-arrow" alt="arrow right">
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="doct-files">
                        <div class="doct-files-title">
                            <h2>Case Documents and Files </h2>
                            <button class="upload-btn" data-toggle="modal" data-target="#uploadModal">Upload</button>
                        </div>

                        <table class="dashboard-table">
                            <thead>
                            <tr>
                                <th scope="col">Document</th>
                                <th scope="col">UPLOADED BY</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Document 1</th>
                                <td>John Doe</td>
                                <td>
                                    <a href="">
                                        View
                                        <img src="../images/arrow-right-blue.png" class="table-right-arrow" alt="arrow right">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Document 2</th>
                                <td>Jane Smith</td>
                                <td>
                                    <a href="">
                                        View
                                        <img src="../images/arrow-right-blue.png" class="table-right-arrow" alt="arrow right">
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </main>

    </div>

@endsection
