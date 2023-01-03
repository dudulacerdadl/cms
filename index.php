<?php

define('ROOT', dirname(__FILE__));

require_once ROOT . '/route.php';
require_once ROOT . '/vendor/autoload.php';

$route = new Route();

$route->add('/', '\\Cms\\Controller\\FrontendController', 'index');
$route->add('/admin/home', '\\Cms\\Controller\\BackendController', 'profile');
$route->add('/admin/signin', '\\Cms\\Controller\\BackendController', 'signin');
$route->add('/admin/signup', '\\Cms\\Controller\\BackendController', 'signup');
$route->add('/admin/signout', '\\Cms\\Controller\\BackendController', 'signout');
$route->add('/admin/edit', '\\Cms\\Controller\\BackendController', 'edit');
$route->add('/admin/sign/exec', '\\Cms\\Controller\\BackendController', 'exec');
$route->submit();
