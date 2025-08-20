{{-- resources/views/tasks/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<h1>Edit Task</h1>

<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Due Date</label>
        <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $task->due_date) }}">
        @error('due_date') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update Task</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection