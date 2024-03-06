@extends('layouts.app')

@section('content')
    <main>
        <section class="faq sign-in">
            <div class="container">
                <div class="faq-content">
                    <div class="text-part">
                        <!-- added "validation" class to the signin form to validate the form -->
                        <form method="POST" action="{{ route('login') }}" class="contact-form sign-in-form">
                            @csrf
                            <div class="title w-100">
                                <h1 class="secondary-title">Sign In</h1>
                                <span class="paragraph">Don't have an account yet? <a href="{{ route('register') }}">Registrate.</a></span>
                            </div>
                            <div class="form-item w-100">
                                <input id="email" type="email"
                                       class="form-control w-100 @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-item password w-100">
                                <input id="password" type="password"
                                       class="form-control w-100 @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">
                                <button type="button" id="show" class="show-pass">
                                    <i class="fa-regular fa-eye-slash"></i>
                                </button>
                                <button type="button" id="hide" class="show-pass d-none">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <a href="" class="forget-pass paragraph">Forgot password?</a>

                            <button type="submit" class="send-btn secondary w-100">Sign in</button>
                        </form>
                    </div>
                    <div class="image-part">
                        <img src="images/faq-image.png" alt="faq main image">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
