@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="text-center mt-5 mb-3">{{ $todoId->title }}</h4>
                <div class="card">
                    <div class="card-header">
                        توضیحات
                    </div>
                    <div class="card-body">
                        {{ $todoId->description }}
                    </div>
                    <hr>
                    <div class="d-flex mr-3 mb-3">
                        <a class="btn btn-sm btn-outline-dark" href="{{ route('todo.edit' , ['todoId' => $todoId->id]) }}">
                            ویرایش
                        </a>
                        <form class="mr-2" action="{{ route('todo.delete' , ['todoId' => $todoId->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger">حذف</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection