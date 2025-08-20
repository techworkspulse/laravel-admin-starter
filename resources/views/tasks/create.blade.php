{{-- resources/views/tasks/create.blade.php --}}
@extends('layouts.app')

@section('content')
<h1>Create Task</h1>

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Due Date</label>
        <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}">
        @error('due_date') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button type="submit" class="btn btn-success">Create Task</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection