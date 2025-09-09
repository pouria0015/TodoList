@extends('layouts.app')

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
      <div class="container mt-5" id="detail-page">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="text-center mt-5 mb-3">{{ $todoId->title }}</h4>
                <div class="card card-custom">
                    <div class="card-header card-header-custom">
                        <i class="bi bi-card-text"></i>
                        توضیحات تسک
                    </div>
                    <div class="card-body">
                        <div class="description-box">
                            {{ $todoId->description }}
                        </div>
                    </div>
                    <div class="card-footer bg-transparent d-flex justify-content-end">
                        <a class="btn btn-custom-outline me-2" href="{{ route('todo.edit' , ['todoId' => $todoId->id]) }}">
                            <i class="bi bi-pencil"></i>
                            ویرایش
                        </a>
                        <form action="{{ route('todo.delete' , ['todoId' => $todoId->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                                حذف
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection