@extends('/layouts/app')

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
        <!-- بخش اصلی لیست تسک‌ها -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="page-title">
                        <i class="bi bi-list-task"></i>
                        مدیریت تسک‌ها
                    </h1>
                    <a class="btn btn-custom-primary" href="{{ route('todo.create') }}">
                        <i class="bi bi-plus-circle"></i>
                        ایجاد تسک جدید
                    </a>
                </div>

                <div class="card card-custom mb-4">
                    <div class="card-header card-header-custom">
                        <i class="bi bi-card-checklist"></i>
                        تسک‌های شما
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach($todos as $todo)
                            <div class="list-group-item todo-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        @if($todo->status)
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <span class="text-decoration-line-through text-muted">{{ $todo->title }}</span>
                                        @else
                                        <i class="bi bi-circle me-2"></i>
                                        <span>{{ $todo->title }}</span>
                                        @endif
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('todo.show' , ['todoId' => $todo->id]) }}" class="btn btn-sm btn-action btn-show">
                                            <i class="bi bi-eye"></i>
                                            نمایش
                                        </a>
                                        @if(!$todo->status)
                                        <a href="{{ route('todo.completed' , ['todoId' => $todo->id]) }}" class="btn btn-sm btn-action btn-complete">
                                            <i class="bi bi-check-lg"></i>
                                            انجام شد
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="pagination-custom">
                        {{ $todos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection