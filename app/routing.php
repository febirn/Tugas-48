<?php

$app->get('/', 'App\Controllers\HomeController:index');

$app->get('/user', 'App\Controllers\UserController:index')->setName('user');
$app->get('/user/add', 'App\Controllers\UserController:getAdd')->setName('user.add');
$app->post('/user/add', 'App\Controllers\UserController:add')->setName('user.add.post');
$app->get('/user/del/{id}', 'App\Controllers\UserController:softDelete')->setName('user.del');
$app->get('/user/edit/{id}', 'App\Controllers\UserController:edit')->setName('user.edit');
$app->get('/user/{id}', 'App\Controllers\UserController:getById')->setName('user.id');

?>