@extends('layouts.app')
@section('content')

<div class="container">
<div class="d-flex justify-content-between mb-2">
        <h2>Task</h2>
        <a href="{{ route('tasks.index') }}" class="btn btn-danger btn-icon">
            <i class="feather icon-arrow-left-circle"></i>
            Back
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <span class="text-danger">*</span> - обязательно для заполнения
            <form action="{{ route('tasks.update', $task->id) }}" method="post" class="mt-2" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-label-group uz">
                    <input type="text" name="title" class="form-control" placeholder="Заголовок *" required
                           value="{{ old('title', $task->title) }}" id="title_en">
                    <label for="title_en">
                        Заголовок
                        <span class="text-danger">*</span>
                    </label>
                </div>

                <div class="form-label-group uz">
                    <input type="text" name="description" class="form-control" placeholder="Описание *" required
                           value="{{ old('description', $task->description) }}" id="title_en">
                    <label for="title_en">
                        Описание
                        <span class="text-danger">*</span>
                    </label>
                </div>

                <div class="form-label-group uz">
                    <select name="completed">
                            <option value="1" {{ $task->completed == 1 ? 'selected' : '' }}>Сделано</option>
                            <option value="0" {{ $task->completed == 0 ? 'selected' : ''}}>Не выполнено</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-icon">
                        <i class="feather icon-file-text"></i>
                        Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection
