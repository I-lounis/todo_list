<?php
require_once(__DIR__ . '/../vendor/autoload.php');
session_start();
use Config\Router;

$router = new Router;

$router->addRoute('/', 'HomeController', 'index');
$router->addRoute('/ajoutTache', 'TaskController', 'addTask');
$router->addRoute('/tache', 'TaskController', 'editTask');
$router->addRoute('/supprTache', 'TaskController', 'deleteTask');

$router->handleRequest();