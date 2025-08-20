{{-- resources/views/tasks/index.blade.php --}}
@extends('layouts.app')

@section('content')
<h1>All Tasks</h1>

<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($tasks->count())
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->due_date ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Update</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this task?')" class="btn btn-sm btn-danger">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No tasks found.</p>
@endif
@endsection