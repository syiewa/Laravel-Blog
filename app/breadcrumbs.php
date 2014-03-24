<?php

Breadcrumbs::register('admin.artikel.index', function($breadcrumbs) {
    $breadcrumbs->push('Home', route('admin.artikel.index'));
});

Breadcrumbs::register('admin.artikel.create', function($breadcrumbs) {
    $breadcrumbs->parent('admin.artikel.index');
    $breadcrumbs->push('Create Artikel', route('admin.artikel.create'));
});

Breadcrumbs::register('admin.artikel.edit', function($breadcrumbs, $artikel) {
    $breadcrumbs->parent('admin.artikel.index');
    $breadcrumbs->push('Edit Article', route('admin.artikel.edit', $artikel));
});

Breadcrumbs::register('admin.comments.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.artikel.index');
    $breadcrumbs->push('All Article Comments', route('admin.comments.index'));
});

Breadcrumbs::register('admin.users.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.artikel.index');
    $breadcrumbs->push('All Users', route('admin.users.index'));
});

Breadcrumbs::register('admin.users.create', function($breadcrumbs) {
    $breadcrumbs->parent('admin.users.index');
    $breadcrumbs->push('Create User', route('admin.users.create'));
});

Breadcrumbs::register('admin.users.create', function($breadcrumbs) {
    $breadcrumbs->parent('admin.users.index');
    $breadcrumbs->push('Create User', route('admin.users.create'));
});

Breadcrumbs::register('admin.users.edit', function($breadcrumbs, $user) {
    $breadcrumbs->parent('admin.users.index');
    $breadcrumbs->push('Edit User', route('admin.users.edit', $user));
});

Breadcrumbs::register('admin.links.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.artikel.index');
    $breadcrumbs->push('All Links', route('admin.links.index'));
});

Breadcrumbs::register('admin.links.create', function($breadcrumbs) {
    $breadcrumbs->parent('admin.links.index');
    $breadcrumbs->push('Create Link', route('admin.links.create'));
});

Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('artikel', function($breadcrumbs, $Artikel) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($Artikel->judul, route('artikel', $Artikel->slug));
});
