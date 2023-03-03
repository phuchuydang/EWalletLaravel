<?php 

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('user.index', function ($trail) {
    $home = __('messages.breadcrumb.home');
    $trail->push('Home', route('user.index'));
});

Breadcrumbs::for('user.profile.get', function ($trail) {
    $home = __('messages.breadcrumb.home');
    $trail->parent('user.index');
    $trail->push('Profile', route('user.profile.get'));
});

Breadcrumbs::for('user.deposit.get', function ($trail) {
    $home = __('messages.breadcrumb.home');
    $trail->parent('user.index');
    $trail->push('Deposit', route('user.deposit.get'));
});

Breadcrumbs::for('user.buyCard.get', function ($trail) {
    $home = __('messages.breadcrumb.home');
    $trail->parent('user.index');
    $trail->push('Buy Card', route('user.buyCard.get'));
});

Breadcrumbs::for('user.withdraw.get', function ($trail) {
    $home = __('messages.breadcrumb.home');
    $trail->parent('user.index');
    $trail->push('Withdraw', route('user.withdraw.get'));
});

Breadcrumbs::for('user.transfer.get', function ($trail) {
    $home = __('messages.breadcrumb.home');
    $trail->parent('user.index');
    $trail->push('Transfer', route('user.transfer.get'));
});

Breadcrumbs::for('user.transfer.verify.get', function ($trail) {
    $home = __('messages.breadcrumb.home');
    $trail->parent('user.index');
    $trail->push('Transfer', route('user.transfer.get'));
    $trail->push('Verify', route('user.transfer.verify.get'));
});

Breadcrumbs::for('user.history.get', function ($trail) {
    $home = __('messages.breadcrumb.home');
    $trail->parent('user.index');
    $trail->push('History', route('user.history.get'));
});

//ADMIN
Breadcrumbs::for('admin.index', function ($trail) {
    $home = __('messages.breadcrumb.home');
    $trail->push('Dashboard', route('admin.index'));
});
