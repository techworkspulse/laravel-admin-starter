@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-start">
            Task List
        </div>
        @can('task_create')
        <div class="float-end">
            <a class="btn btn-success btn-sm text-white" href="{{ route(" admin.tasks.create") }}">
                Add Task
            </a>
        </div>
        @endcan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>
                            ID
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr data-entry-id="{{ $task->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $task->id ?? '' }}
                        </td>
                        <td>
                            {{ $task->name ?? '' }}
                        </td>
                        <td>
                            @can('permission_edit')
                            <a class="badge bg-info" href="{{ route('admin.tasks.edit', $task->id) }}">
                                Edit
                            </a>
                            @endcan

                            @can('task_delete')
                            <form id="delete-form-{{ $task->id }}" method="post"
                                action="{{ route('admin.tasks.destroy', $task->id) }}" style="display: none">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                            </form>
                            <a href="javascript:void(0)" class="badge bg-danger text-white" onclick="
                                        if(confirm('Are you sure, You want to Delete this ??'))
                                        {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{ $task->id }}').submit();
                                        }">Delete
                            </a>
                            @endcan

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection