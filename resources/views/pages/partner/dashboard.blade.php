@extends('layouts.left-menu')

@section('title')
    Partner Dashboard
@endsection

@section('content')

    <main class="user-dashboard-main">
        <section>
            <div class="user-container">
                <div class="user-main-title-container">
                    <div class="left-side">
                        <h1 class="user-main-title">Partner Dashboard</h1>
                        <span class="paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                    </div>
                    {{--<button class="file-new-case paragraph secondary" data-toggle="modal"
                            data-target="#fileCaseModal">File New Case
                    </button>--}}
                </div>
                <div class="container-fluid p-0 mb-5">
                    <div class="row">
                        <div class="col-md-12 col-lg-3 mt-3">
                            <div class="rounded p-3 partner_box">
                                <img src="{{asset('img/partner/1.png')}}" alt="">
                                <h4>
                                    Active Cases
                                </h4>
                                <p>4</p>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-3 mt-3">
                            <div class="rounded p-3 partner_box">
                                <img src="{{asset('img/partner/2.png')}}" alt="">
                                <h4>
                                    Disputes Resolved
                                </h4>
                                <p>16</p>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-3 mt-3">
                            <div class="rounded p-3 partner_box">
                                <img src="{{asset('img/partner/3.png')}}" alt="">
                                <h4>
                                    Contribution to Cases
                                </h4>
                                <p>65.55%</p>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-3 mt-3">
                            <div class="rounded p-3 partner_box">
                                <img src="{{asset('img/partner/4.png')}}" alt="">
                                <h4>
                                    Success Rate
                                </h4>
                                <p>85%</p>
                            </div>
                        </div>
                    </div>
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
                    @foreach($cases as $case)
                        <tr>
                            <td>{{$case->number}}</td>
                            <td class="text-capitalize">{{$case->status}}</td>
                            <td>{{$case->claimant}}</td>
                            <td>-</td>
                            <td>
                                <a href="{{ route('partners.show', $case->id) }}">
                                    <span>View Case</span>
                                    <img src="../images/arrow-right-blue.png" class="table-right-arrow"
                                         alt="arrow right">
                                </a>
                            </td>
                        </tr>
                    @endforeach
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
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    </div>

@endsection
