@extends('layouts.app')
@section('content')
<div class="container">
<div class="d-flex justify-content-between mb-2">
        <h2>Доп опции</h2>
        <div>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-icon">
                <i class="feather icon-plus-circle"></i>
                Добавить
            </a>
        </div>
    </div>
    <div class="card">
        <table class="table mb-0">
            <thead class="thead-dark">
            <tr>
                <th>Заголовок</th>
                <th class="text-right">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($tasks as $item)
                <tr>

                    <td>{{ $item->title }}</td>
                    <td class="text-right">
                        <a href="{{ route('tasks.edit', $item->id) }}"
                           class="btn btn-warning btn-icon btn-sm" title="Редактировать" data-toggle="tooltip">
                            <i class="feather icon-edit"></i>Edit
                        </a>
                        <a href="{{ route('tasks.destroy', $item->id) }}"
                           onclick="return confirm('Вы действительно хотите удалить?')"
                           class="btn btn-danger btn-icon btn-sm" title="Удалить" data-toggle="tooltip">
                           DElete
                            <i class="feather icon-trash"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="alert alert-info">
                        <p class="text-center">Пока данных нету...</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
    
@endsection