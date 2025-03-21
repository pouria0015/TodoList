@extends('layouts.app')


@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <div class="card">
                <div class="card-header">
                    ورود به حساب کاربری 
                </div>
                <div class="card-body">
                    @if(Session::has('successRegister'))    
                    <span style="color:chartreuse">
                        {{ Session::get('successRegister') }}
                    </span>
                    @elseif(Session::has('failedInLogin'))    
                    <span style="color:brown">
                        {{ Session::get('failedInLogin') }}
                    </span>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email"> ایمیل <sup>*</sup> </label>
                            <input type="email" name="email" class="form-control @error('email') form-control-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                            <p class="invalid-feedback d-block">
                                <strong> {{ $message }} </strong>
                            </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password"> رمز عبور <sup>*</sup> </label>
                            <input type="password" name="password" class="form-control @error('password') form-control-invalid @enderror" value="{{ old('password') }}">
                            @error('password')
                            <p class="invalid-feedback d-block">
                                        <strong> {{ $message }} </strong>
                                    </p>
                                    @enderror
                        </div>

                        <div class="text-right my-4">
                            <button class="btn btn-dark" type="submit"> ورود </button>
                        </div>
                        <div class="form-group">
                            <p class="">
                                <strong> حساب کاربری ندارید؟ثبت نام کنید: </strong> <a href="{{ route('auth.show.register') }}">ثبت نام</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('contetns')