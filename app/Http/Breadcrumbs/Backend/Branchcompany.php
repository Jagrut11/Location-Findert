<?php

Breadcrumbs::register('admin.branchcompanies.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.branchcompanies.management'), route('admin.branchcompanies.index'));
});

Breadcrumbs::register('admin.branchcompanies.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.branchcompanies.index');
    $breadcrumbs->push(trans('menus.backend.branchcompanies.create'), route('admin.branchcompanies.create'));
});

Breadcrumbs::register('admin.branchcompanies.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.branchcompanies.index');
    $breadcrumbs->push(trans('menus.backend.branchcompanies.edit'), route('admin.branchcompanies.edit', $id));
});
