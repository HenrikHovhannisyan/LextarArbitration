<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/user-dashboard/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="{{asset('/user-dashboard/js/app.js')}}"></script>
    <script src="{{asset('/js/app.js')}}"></script>
</head>
<body>
<div id="app">

    <div class="user-dashboard">
        <aside>
            <a href="" class="logo">
                <img src="{{asset('images/Logo.png')}}" alt="Logo">
            </a>
            <ul class="aside-menu">

                @if(Auth::user()->is_admin == 4)
                    <li class="{{isActiveRoute("partner.index")}}">
                        <a href="{{route('partner.index')}}">
                            <img src="/user-dashboard/images/edit 1.png" alt="edit icon">
                            Partner Dashboard
                        </a>
                    </li>
                @elseif(Auth::user()->is_admin == 3)
                    <li class="{{isActiveRoute("manager.index")}}">
                        <a href="{{route('manager.index')}}">
                            <img src="/user-dashboard/images/edit 1.png" alt="edit icon">
                            Cases
                        </a>
                    </li>
                @else
                    <li class="{{isActiveRoute("cases.index")}}">
                        <a href="{{route('cases.index')}}">
                            <img src="/user-dashboard/images/edit 1.png" alt="edit icon">
                            My Cases
                        </a>
                    </li>
                @endif
                <li>
                    <a href="https://wp7387.freelancedeveloper.site/rules-and-forms/">
                        <img src="/user-dashboard/images/pdf 1.png" alt="pdf icon">
                        Rules & Forms
                    </a>
                </li>
                <li class="{{isActiveRoute("users.edit")}}">
                    <a href="{{route('users.edit', Auth::user()->id )}}">
                        <img src="/user-dashboard/images/account.png" alt="account icon">
                        My Account
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#logoutModal">
                        <img src="/user-dashboard/images/logout 1.png" alt="logout icon">
                        Log out
                    </a>
                </li>
            </ul>
        </aside>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close border border-dark rounded-circle" data-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{asset('/img/LOGOUT.png')}}" style="width: 100px;" alt="">
                        <p class="mt-4">Are you sure you want to log out?</p>
                    </div>
                    <div class="modal-footer border-0 d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-outline-primary rounded-0" data-dismiss="modal">Cancel
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary rounded-0">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- File Case Modal -->
        <div class="modal fade upload-modal file-case-modal" id="fileCaseModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><img src="../images/Close_Circle.png" alt="close icon"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h1 class="text-center">File New Case</h1>
                        <div class="file-case-content user-dashboard-file-case">
                            <div class="left-side">
                                <div class="item">
                                    <h3 class="title text-center">To file a new case, you will need to:</h3>
                                    <ul class="paragraph">
                                        <li>Complete and upload a filing form</li>
                                        <li>Upload a copy of the arbitration or mediation agreement</li>
                                        <li>Pay the appropriate fee</li>
                                    </ul>
                                    <div class="note">Please note that all fields below are mandatory and you must
                                        attach at least one document.
                                    </div>
                                </div>
                            </div>
                            <div class="right-side w-100" id="arbitration-rules-content">
                                <!-- added "validation" class to the file case form to validate the form -->
                                <form action="{{ route('cases.store') }}" method="POST" class="file-case-form"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-item">
                                        <input type="text" name="claimant" class="full-name" placeholder="Full name"
                                               required="">
                                        <span>Please enter full name.</span>
                                    </div>
                                    <div class="form-item">
                                        <input type="email" name="email" class="email" placeholder="Email" required="">
                                        <span>Please enter valid email.</span>
                                    </div>
                                    <div class="form-item">
                                        <input type="tel" name="phone" class="phone-number" placeholder="Phone number"
                                               required="">
                                        <span>Please enter phone number.</span>
                                    </div>
                                    <div class="form-item">
                                        <input type="text" name="subject" class="subjectr"
                                               placeholder="Subject (arbitration/mediation)" required="">
                                        <span>Please enter subject.</span>
                                    </div>
                                    <div class="form-item w-100">
                                        <textarea name="message" id="message" placeholder="Message"
                                                  class="message w-100" required=""></textarea>
                                        <span>Please enter message.</span>
                                    </div>
                                    <div class="file-input form-item w-100">
                                        <div class="attach-text">Attach document</div>
                                        <input type="file" name="file" class="file w-100" placeholder="Attach document"
                                               required="">
                                        <span>Please enter attach document.</span>
                                    </div>
                                    <div class="form-item w-100">
                                        <input type="text" name="filing" class="fee w-100"
                                               placeholder="Enter filing fee to be charged" required="">
                                        <span>Please enter filing fee to be charged.</span>
                                    </div>
                                    <div class="form-info w-100">
                                        <span>Please ensure you have uploaded a:</span>
                                        <ul>
                                            <li>Filing Document</li>
                                            <li>Arbitration/Mediation Clause or Agreement</li>
                                        </ul>
                                    </div>
                                    <button type="submit" class="submit secondary">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>

    </div>
</body>
</html>
