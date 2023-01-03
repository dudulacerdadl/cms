<?php

require_once 'route.php';
require_once 'vendor/autoload.php';

session_start();

define('ROOT', dirname(__FILE__));

$route = new Route();

$route->add('/', 'Controller\\FrontendController', 'index');
$route->add('/admin/home', 'Controller\\BackendController', 'profile');
$route->add('/admin/signin', 'Controller\\BackendController', 'signin');
$route->add('/admin/signup', 'Controller\\BackendController', 'signup');
$route->add('/admin/signout', 'Controller\\BackendController', 'signout');
$route->add('/admin/edit', 'Controller\\BackendController', 'edit');
$route->add('/admin/sign/exec', 'Controller\\BackendController', 'exec');
$route->submit();
