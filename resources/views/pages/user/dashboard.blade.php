@extends('layouts.left-menu')

@section('title')
    User Dashboard
@endsection

@section('content')

    <main class="user-dashboard-main">
    @if(Session::has('success'))
        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <img src="{{ asset('images/access-popup-icon.png') }}" class="img-fluid mb-3"
                                 style="width: 155px;">
                            <h2 class="">
                                <strong>{{ Session::get('success') }}</strong>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                    myModal.show();
                });
            </script>
        @endif
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
                    @foreach($cases as $case)
                        <tr>
                            <td>{{$case->number}}</td>
                            <td class="text-capitalize">{{$case->status}}</td>
                            <td>{{$case->claimant}}</td>
                            <td>@if($case->respondent) {{$case->respondent}} @else - @endif</td>
                            <td>
                                <a href="{{ route('cases.show', $case->id) }}">
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
