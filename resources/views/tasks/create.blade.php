@extends('layouts.master')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header">
            Create Task
        </div>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="card-body">
                {{-- Title --}}
                <div class="mb-2">
                    <label for="title">Title*</label>
                    <input type="text" id="title" name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="mb-2">
                    <label for="description">Description</label>
                    <textarea id="description" name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Due Date --}}
                <div class="mb-2">
                    <label for="due_date">Due Date</label>
                    <input type="date" id="due_date" name="due_date"
                           class="form-control @error('due_date') is-invalid @enderror"
                           value="{{ old('due_date') }}">
                    @error('due_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary me-2" type="submit">Save</button>
                <a class="btn btn-secondary" href="{{ route('tasks.index') }}">
                    Back to list
                </a>
            </div>
        </form>
    </div>
@endsection
