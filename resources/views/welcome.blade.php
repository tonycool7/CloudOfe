<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="index/follow"/>
        <meta name="DC.title" content="CloudOfe"/>
        <meta name="description" content="Welcome to CloudOfe, We are a file hosting company. Put all your work in one place.">
        <meta name="keywords" content="Cloud. CloudOfe, file sharing, file hosting, access files from anywhere"/>
        <meta itemprop="name" content="CloudOfe">
        <meta itemprop="description" content="Welcome to CloudOfe, We are a file hosting company. Put all your work in one place.">
        <meta property="og:image" content=""/>
        <meta name="og:title" content="CloudOfe">
        <meta name="og:description" content="Welcome to CloudOfe, We are a file hosting company. Put all your work in one place.">
        <meta name="og:url" content="">
        <meta name="og:site_name" content="CloudOfe">
        <meta name="og:locale" content="en_US">
        <meta name="og:type" content="website">
        <title>CloudOfe</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link type="text/css" rel="stylesheet" href="{{mix('css/all.css')}}">
    </head>
    <body>
        <div class="app">
            <section class="container">
                <div class="row position-relative">
                    <div class="logo-container">
                        <a class="logo">CloudOfe</a>
                    </div>
                    <div class="login-container position-absolute">
                         <a href="{{route('login')}}" class="login"><i class="fa fa-user"></i> Login</a>
                    </div>
                </div>
            </section>
            <section class="container">
                <hr/>
            </section>
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

            <footer>
                <div class="container footer-container">
                    <div class="row">
                        <div class="col-my-5">
                            <h4 class="footer-title">CloudOfe</h4>
                            <ul class="footer-list">
                                <li><a href="">Security</a></li>
                                <li><a href="">Mobile App</a></li>
                                <li><a href="">Desktop App</a></li>
                                <li><a href="">Plans</a></li>
                            </ul>
                        </div>
                        <div class="col-my-5">
                            <h4 class="footer-title">Company</h4>
                            <ul class="footer-list">
                                <li><a href="">Jobs</a></li>
                                <li><a href="">About Us</a></li>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Press</a></li>
                            </ul>
                        </div>
                        <div class="col-my-5">
                            <h4 class="footer-title">Products</h4>
                            <ul class="footer-list">
                                <li><a href="">Mini</a></li>
                                <li><a href="">Midi</a></li>
                                <li><a href="">Maxi</a></li>
                                <li><a href="">Maxiplus</a></li>
                                <li><a href="">Advertise</a></li>
                            </ul>
                        </div>
                        <div class="col-my-5">
                            <h4 class="footer-title">Support</h4>
                            <ul class="footer-list">
                                <li><a href="">Privacy & Terms</a></li>
                                <li><a href="">Contact</a></li>
                                <li><a href="">Help Center</a></li>
                            </ul>
                        </div>
                        <div class="col-my-5">
                            <h4 class="footer-title">Community</h4>
                            <ul class="footer-list">
                                <li><a href="">Forum</a></li>
                                <li><a href="">Developer</a></li>
                                <li><a href="">Referals</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
