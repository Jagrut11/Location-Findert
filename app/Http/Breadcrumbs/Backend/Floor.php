<?php

Breadcrumbs::register('admin.floors.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.floors.management'), route('admin.floors.index'));
});

Breadcrumbs::register('admin.floors.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.floors.index');
    $breadcrumbs->push(trans('menus.backend.floors.create'), route('admin.floors.create'));
});

Breadcrumbs::register('admin.floors.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.floors.index');
    $breadcrumbs->push(trans('menus.backend.floors.edit'), route('admin.floors.edit', $id));
});
