@extends('layouts.left-menu')

@section('title')
    User Dashboard
@endsection

@section('content')

    <main class="user-dashboard-main">
        <section>
            <div class="user-container">
                <div class="user-main-title-container">
                    <a href="@if(Auth::user()->is_admin == 3){{route('manager.index')}} @else {{route('cases.index')}} @endif"
                       class="case-number"><img src="../images/back-icon.png"
                                                alt="back icon"></a>
                    <div class="left-side">
                        <div class="d-flex">
                            <h1 class="user-main-title">{{$case->number}}</h1>
                            @if(Auth::user()->is_admin == 3)
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                    Edit
                                </button>
                            @endif
                        </div>
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
                        <td class="text-capitalize">
                        {{$case->status}}</th>
                        <td>{{$case->claimant}}</td>
                        <td>@if($case->respondent) {{$case->respondent}} @else - @endif</td>
                        <td>@if($case->arbitrator) {{$case->arbitrator}} @else - @endif</td>
                        <td>@if($case->partner) {{ $partner->company_name }} @else - @endif</td>
                    </tr>
                    </tbody>
                </table>
                <div class="single-case-tables">
                    <div class="upcoming-events w-100">
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
                            {{--<tr>
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
                            </tr>--}}
                            </tbody>
                        </table>
                    </div>
                    <div class="doct-files">
                        <div class="doct-files-title">
                            <h2>Case Documents and Files </h2>
                            @if($case->reactivate === "inactive" || $case->reactivate ==="on-hold")
                            @else
                            <button class="upload-btn" data-toggle="modal" data-target="#newFileCaseModal">
                                Upload
                            </button>
                            @endif
                        </div>

                        <table class="dashboard-table">
                            <thead>
                            <tr>
                                <th scope="col">UPLOADED BY</th>
                                <th scope="col">Attachment</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td>{{ $file->user->name }}</td>
                                    <td>
                                        <a href="{{ asset($file->filename) }}" target="_blank">
                                            View
                                            <img src="../images/arrow-right-blue.png" class="table-right-arrow"
                                                 alt="arrow right">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </main>

    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Case</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your edit form here -->
                    <form action="{{ route('cases.update', ['case' => $case->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="respondent" class="form-label">Respondent</label>
                            <input type="text" class="form-control" id="respondent" name="respondent"
                                   value="{{ $case->respondent }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="arbitrator" class="form-label">Arbitrator</label>
                            <input type="text" class="form-control" id="arbitrator" name="arbitrator"
                                   value="{{ $case->arbitrator }}" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="partner">Partner</label>
                                <select class="form-control" id="partner" name="partner" required>
                                    <option value="">Select Partner</option>
                                    {{--                                    <option value="{{ $case->partner }}">{{ $case->partner }}</option>--}}
                                    @foreach($partners as $partner)
                                        <option value="{{ $partner->id }}">{{ $partner->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
