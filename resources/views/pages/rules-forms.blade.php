@extends('layouts.app')

@section('title')
    FAQ
@endsection

@section('content')

    <main>
        <section class="faq-page practices-areas rules-forms">
            <div class="container">
                <div class="section-title">
                    <h1 class="main-title centered">Rules & Forms</h1>
                    <p class="paragraph centered">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                        <br>
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.
                        <br>
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                        id est laborum.
                    </p>
                </div>
                <div class="faq-content">
                    <div class="right-side w-100" id="arbitration-rules-content">
                        <div class="right-side-header">
                            <h3>Arbitration Rules</h3>
                        </div>
                        <div class="practices-areas-list">
                            @foreach($files as $file)
                                <div class="practices-areas-item">
                                    <div class="text">{{$file->name}}</div>
                                    <div class="pdf-files-list">
                                        <a href="{{asset($file->rules)}}" target="_blank">
                                            <img src="images/Rules.png" alt="Rules">
                                            <span>Rules</span>
                                        </a>
                                        <a href="{{asset($file->forms)}}" target="_blank">
                                            <img src="images/Forms.png" alt="Forms">
                                            <span>Forms</span>
                                        </a>
                                        <a href="{{asset($file->fees)}}" target="_blank">
                                            <img src="images/Fees.png" alt="Fees">
                                            <span>Fees</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
