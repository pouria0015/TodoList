@extends('/layouts/app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
        <div class="d-flex justify-content-between align-items-center my-2">
        <h4>تسک ها</h4>
        <a class="btn btn-sm btn-outline-dark" href="{{ route('todo.create') }}">ایجاد تسک</a>
        <a class="btn btn-sm btn-outline-dark" href="{{ route('auth.logout') }}"> خروج از حساب کاربری </a>
        </div>
        
        <div class="card">
                <div class="card-header">
                    تسک ها
                </div>
                <div class="card-body">
                    <ul class="list-group">
                
                    @foreach($todos as $todo)
                        <li class="list-group-item d-flex justify-content-between">
                            {{ $todo->title }}
                            <div class="d-flex">
                            <a href="{{ route('todo.show' , ['todoId' => $todo->id]) }}" class="btn btn-sm btn-dark">نمایش</a>
                    @if(!$todo->status)
                            
                            <a href="{{ route('todo.completed' , ['todoId' => $todo->id]) }}" class="btn btn-sm btn-outline-info">انجام شد</a>
                    @endif
                            </div>
                            </li>
                    @endforeach

                        </ul>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">{{ $todos->links() }}</div>
        </div>
    </div>
</div>

@endsection