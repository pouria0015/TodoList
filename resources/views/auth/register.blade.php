@extends('layouts.app')


@section('contents')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <div class="card">
                <div class="card-header">
                    ایجاد حساب کاربری جدید
                </div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name"> نام <sup>*</sup> </label>
                            <input type="text" name="name" class="form-control @error('name') form-control-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                            <p class="invalid-feedback d-block">
                                <strong> {{ $message }} </strong>
                            </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email"> ایمییل <sup>*</sup> </label>
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

                        <!-- <div class="form-group">
                            <label for="confirm_password">  تکرار مجدد رمز عبور <sup>*</sup> </label>
                            <input type="password" name="confirm_password" class="form-control " value="">
                        </div> -->

                        <div class="text-right my-4">
                            <button class="btn btn-dark" type="submit"> ثبت نام </button>
                        </div>
                        <div class="form-group">
                            <p class="">
                                <strong> حساب کاربری دارید؟ وارد شوید  : </strong> <a href="{{ route('auth.show.login') }}"> ورود </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('contents')