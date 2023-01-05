<?php

define('ROOT', dirname(__FILE__));

if (!file_exists(ROOT . '/vendor/autoload.php')) {
    die("Necessary run 'composer install'");
}

require_once ROOT . '/vendor/autoload.php';

$route = new \Cms\Model\Route();

$route->add('/', \Cms\Controller\FrontendController::class, 'index');
$route->add('/admin/home', \Cms\Controller\BackendController::class, 'profile');
$route->add('/admin/signin', \Cms\Controller\BackendController::class, 'signin');
$route->add('/admin/signup', \Cms\Controller\BackendController::class, 'signup');
$route->add('/admin/signout', \Cms\Controller\BackendController::class, 'signout');
$route->add('/admin/edit', \Cms\Controller\BackendController::class, 'edit');
$route->add('/admin/sign/exec', \Cms\Controller\BackendController::class, 'exec');
$route->add('/news', \Cms\Controller\NewsController::class, 'open');
$route->add('/news/new', \Cms\Controller\NewsController::class, 'new');
$route->add('/news/edit', \Cms\Controller\NewsController::class, 'edit');
$route->add('/news/edit/exec', \Cms\Controller\NewsController::class, 'exec');
$route->submit();
