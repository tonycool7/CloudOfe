@extends('layouts.app')

@section('content')

    {{--Register section--}}
        <section class="container register">
            <div class="row">
                <div class="col-md-3 col-xl-3 col-sm-3 col-lg-3 quotes-container">
                    <h4 class="quotes-header">Quotes of the day</h4>
                    <div class="quote-content row">
                        <div class="col-md-5 quote-img-container">
                            <div class="quote-img">
                                <img src="/images/q1.png">
                            </div>
                        </div>
                        <div class="col-md-7 quote-text-container">
                            <h4 class="quote-author">William Wrigley :</h4>
                            <p>‘’When two men in business always
                                agree, one of them is unnecessary.’’</p>
                        </div>
                    </div>
                    <div class="quote-content row">
                        <div class="col-md-5 quote-img-container">
                            <div class="quote-img">
                                <img src="/images/q2.png">
                            </div>
                        </div>
                        <div class="col-md-7 quote-text-container">
                            <h4 class="quote-author">William Wrigley :</h4>
                            <p>‘’When two men in business always
                                agree, one of them is unnecessary.’’</p>
                        </div>
                    </div>
                    <div class="quote-content row">
                        <div class="col-md-5 quote-img-container">
                            <div class="quote-img">
                                <img src="/images/q3.png">
                            </div>
                        </div>
                        <div class="col-md-7 quote-text-container">
                            <h4 class="quote-author">William Wrigley :</h4>
                            <p>‘’When two men in business always
                                agree, one of them is unnecessary.’’</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-6 col-sm-6 col-lg-6 register-container">
                    <h4 class="register-container-header">sign up to get your
                        business in the cloudofe</h4>
                    <hr/>
                    <form class="form form-horizontal" method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>

                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus/>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <h4 class="register-container-footer">by signing up, you agree to our terms
                                and privacy policy
                            </h4>
                        </div>

                    </form>
                </div>
                <div class="col-md-3 col-xl-3 col-sm-3 col-lg-3 quotes-container">
                    <h4 class="quotes-header">Quotes of the week</h4>
                    <div class="quote-content row">
                        <div class="col-md-5 quote-img-container">
                            <div class="quote-img">
                                <img src="/images/q1.png">
                            </div>
                        </div>
                        <div class="col-md-7 quote-text-container">
                            <h4 class="quote-author">William Wrigley :</h4>
                            <p>‘’When two men in business always
                                agree, one of them is unnecessary.’’</p>
                        </div>
                    </div>
                    <div class="quote-content row">
                        <div class="col-md-5 quote-img-container">
                            <div class="quote-img">
                                <img src="/images/q2.png">
                            </div>
                        </div>
                        <div class="col-md-7 quote-text-container">
                            <h4 class="quote-author">William Wrigley :</h4>
                            <p>‘’When two men in business always
                                agree, one of them is unnecessary.’’</p>
                        </div>
                    </div>
                    <div class="quote-content row">
                        <div class="col-md-5 quote-img-container">
                            <div class="quote-img">
                                <img src="/images/q3.png">
                            </div>
                        </div>
                        <div class="col-md-7 quote-text-container">
                            <h4 class="quote-author">William Wrigley :</h4>
                            <p>‘’When two men in business always
                                agree, one of them is unnecessary.’’</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--end of registration section--}}
        <section class="container">
            <img class="custom-hr" src="/images/custom-hr.png">
        </section>

        <section class="container">
            <div class="intro-block">
                <div class="intro-box">

                </div>
                <div class="intro-box">

                </div>
                <div class="intro-box">

                </div>
            </div>
        </section>
@endsection
