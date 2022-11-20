<?php

use App\Controllers\UserController;
use App\Database\ConnectionSelector;
use App\Repositories\Repo;

require __DIR__ . '/vendor/autoload.php';
header('Content-Type: application/json');

ConnectionSelector::setDb();

$controller = new UserController(Repo::get('UserRepository'));

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo $controller->index();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $controller->store($_POST);
}