<?php

Breadcrumbs::register('admin.branches.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.branches.management'), route('admin.branches.index'));
});

Breadcrumbs::register('admin.branches.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.branches.index');
    $breadcrumbs->push(trans('menus.backend.branches.create'), route('admin.branches.create'));
});

Breadcrumbs::register('admin.branches.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.branches.index');
    $breadcrumbs->push(trans('menus.backend.branches.edit'), route('admin.branches.edit', $id));
});
