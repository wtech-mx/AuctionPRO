@extends('includes.masterpage')

@section('content')

    <section class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12">
                    <div class="login-form">
                        <div class="login-icon"><i class="fa fa-user"></i></div>

                        <div class="section-borders">
                            <span></span>
                            <span class="black-border"></span>
                            <span></span>
                        </div>

                        <div class="login-title">{{$language->sign_up}}</div>

                        <form action="{{route('user.reg.submit')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-unlock-alt"></i>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-unlock-alt"></i>
                                    </div>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div id="resp" class="col-md-12">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>* {{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>* {{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>* {{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn login-btn" name="button">Register</button>

                                <p><a href="{{route('user.login')}}" class="col-md-12">Already Have Account? Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('footer')

@stop