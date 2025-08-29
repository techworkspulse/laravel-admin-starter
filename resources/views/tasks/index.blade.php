@extends('layouts.app')

@section('content')
    <h1>Tasks</h1>
    <a href="{{ route('tasks.create') }}">+ New Task</a>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <ul>
        @foreach ($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong> - {{ $task->due_date }}
                <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this task?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    {{ $tasks->links() }}
@endsection
