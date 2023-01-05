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
$route->add('/notice', \Cms\Controller\NoticeController::class, 'open');
$route->add('/notice/new', \Cms\Controller\NoticeController::class, 'new');
$route->add('/notice/edit', \Cms\Controller\NoticeController::class, 'edit');
$route->add('/notice/edit/exec', \Cms\Controller\NoticeController::class, 'exec');
$route->submit();
