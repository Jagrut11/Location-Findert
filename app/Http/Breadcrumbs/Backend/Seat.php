<?php

Breadcrumbs::register('admin.seats.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.seats.management'), route('admin.seats.index'));
});

Breadcrumbs::register('admin.seats.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.seats.index');
    $breadcrumbs->push(trans('menus.backend.seats.create'), route('admin.seats.create'));
});

Breadcrumbs::register('admin.seats.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.seats.index');
    $breadcrumbs->push(trans('menus.backend.seats.edit'), route('admin.seats.edit', $id));
});
