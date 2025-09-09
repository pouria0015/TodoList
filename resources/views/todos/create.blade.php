@extends('layouts/app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="bi bi-check2-square me-2"></i>
                <span>Todo App</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.logout') }}">
                            <i class="bi bi-box-arrow-left me-1"></i>
                            خروج از حساب کاربری
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="app-container">

        <div class="row justify-content-center" id="create-form">
            <div class="col-lg-8">

                <div class="card card-custom mb-4">
                    <div class="card-header card-header-custom d-flex align-items-center">
                        <i class="bi bi-plus-circle me-2"></i>
                        ایجاد تسک جدید
                    </div>
                    <div class="card-body">
                        <form action="{{ route('todo.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="form-label">عنوان تسک</label>
                                <input type="text" id="title" name="title" class="form-control form-control-custom @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="عنوان تسک خود را وارد کنید">
                                @error('title')
                                <div class="invalid-feedback d-block mt-2">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label">توضیحات</label>
                                <textarea id="description" name="description" class="form-control form-control-custom @error('description') is-invalid @enderror" rows="5" placeholder="توضیحات مربوط به تسک را وارد کنید">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback d-block mt-2">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-custom-primary" type="submit">
                                    <i class="bi bi-check2-circle me-1"></i>
                                    ایجاد تسک
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection