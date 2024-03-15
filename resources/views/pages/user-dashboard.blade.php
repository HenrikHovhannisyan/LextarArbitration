@extends('layouts.left-menu')

@section('title')
    User Dashboard
@endsection

@section('content')

    <main class="user-dashboard-main">
        <section>
            <div class="user-container">
                <div class="user-main-title-container">
                    <div class="left-side">
                        <h1 class="user-main-title">My Cases</h1>
                        <span class="paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                    </div>
                    <button class="file-new-case paragraph secondary" data-toggle="modal"
                            data-target="#fileCaseModal">File New Case
                    </button>
                </div>
                <div class="case-filtering">
                    <div class="filter-item">
                        <label class="label-container">
                            <input
                                type="radio"
                                name="filterRadio"
                                checked
                            />
                            <span class="checkmark"></span>
                            All
                        </label>
                    </div>
                    <div class="filter-item">
                        <label class="label-container">
                            <input
                                type="radio"
                                name="filterRadio"
                            />
                            <span class="checkmark"></span>
                            Active
                        </label>
                    </div>
                    <div class="filter-item">
                        <label class="label-container">
                            <input
                                type="radio"
                                name="filterRadio"
                            />
                            <span class="checkmark"></span>
                            Inactive
                        </label>
                    </div>
                    <div class="filter-item">
                        <label class="label-container">
                            <input
                                type="radio"
                                name="filterRadio"
                            />
                            <span class="checkmark"></span>
                            Closed
                        </label>
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
                    <tr>
                        <td>CASE-123456
                        </th>
                        <td>Active</td>
                        <td>ABC Corporation</td>
                        <td>XYZ Ltd</td>
                        <td>
                            <a href="{{route('cases-single')}}">
                                <span>View Case</span>
                                <img src="../images/arrow-right-blue.png" class="table-right-arrow"
                                     alt="arrow right">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>CASE-789012
                        </th>
                        <td>Closed</td>
                        <td>John Doe</td>
                        <td>Jane Smith</td>
                        <td>
                            <a href="{{route('cases-single')}}">
                                View Case
                                <img src="../images/arrow-right-blue.png" class="table-right-arrow"
                                     alt="arrow right">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>CASE-123456
                        </th>
                        <td>Inactive</td>
                        <td>ABC Corporation</td>
                        <td>XYZ Ltd</td>
                        <td>
                            <a href="{{route('cases-single')}}">
                                View Case
                                <img src="../images/arrow-right-blue.png" class="table-right-arrow"
                                     alt="arrow right">
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
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
                            <td>Hearing
                            </th>
                            <td>CASE-123456</td>
                            <td>Discovery</td>
                            <td>2024-01-20</td>
                            <td>
                                <a href="">
                                    Join
                                    <img src="../images/arrow-right-blue.png" class="table-right-arrow"
                                         alt="arrow right">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Conference
                            </th>
                            <td>CASE-789012</td>
                            <td>Settlement</td>
                            <td>2024-01-25</td>
                            <td>
                                <a href="" class="disabled">
                                    Join
                                    <img src="../images/arrow-right-blue.png" class="table-right-arrow"
                                         alt="arrow right">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Hearing
                            </th>
                            <td>CASE-123456</td>
                            <td>Arbitration</td>
                            <td> 2024-02-03</td>
                            <td>
                                <a href="" class="disabled">
                                    Join
                                    <img src="../images/arrow-right-blue.png" class="table-right-arrow"
                                         alt="arrow right">
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    </div>

@endsection
