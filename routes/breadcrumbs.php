<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard', route('admin.index'));
});
Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Users', route('admin.users.index'));
});
Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.users.index');
    $trail->push('Add new user', route('admin.users.create'));
});
// Role
Breadcrumbs::for('admin.roles.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Roles', route('admin.roles.index'));
});
Breadcrumbs::for('admin.roles.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.roles.index');

    $trail->push('Add new role', route('admin.roles.create'));
});
Breadcrumbs::for('admin.roles.edit', function (BreadcrumbTrail $trail, Role $post): void {
    $trail->parent('admin.roles.index');

    $trail->push($post->name, route('admin.roles.edit', $post));
});
// Permission
Breadcrumbs::for('admin.permissions.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Permissions', route('admin.permissions.index'));
});
Breadcrumbs::for('admin.permissions.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.permissions.index');

    $trail->push('Add new permission', route('admin.permissions.create'));
});
Breadcrumbs::for('admin.permissions.edit', function (BreadcrumbTrail $trail, Permission $post): void {
    $trail->parent('admin.permissions.index');

    $trail->push($post->name, route('admin.permissions.edit', $post));
});
// profile
Breadcrumbs::for('admin.profile.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Profile', route('admin.profile.index'));
});
// change password
Breadcrumbs::for('admin.password.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.index');
    $trail->push('Change Password', route('admin.password.index'));
});

//task
Breadcrumbs::for('tasks.index', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home')); // or route('dashboard') based on your app
    $trail->push('Tasks', route('tasks.index'));
});

// create task
Breadcrumbs::for('tasks.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tasks.index');
    $trail->push('Create', route('tasks.create'));
});

// edit task
Breadcrumbs::for('tasks.edit', function (BreadcrumbTrail $trail, Task $task) {
    $trail->parent('tasks.index');
    $trail->push('Edit: ' . $task->title, route('tasks.edit', $task));
});