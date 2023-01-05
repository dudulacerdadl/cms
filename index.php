<?php

define('ROOT', dirname(__FILE__));

if (!file_exists(ROOT . '/vendor/autoload.php')) {
    die("Necessary run 'composer install'");
}

require_once ROOT . '/vendor/autoload.php';

$route = new \Cms\Model\Route();

$frontendController = new \Cms\Controller\FrontendController;
$backendController = new \Cms\Controller\BackendController;
$newsController = new \Cms\Controller\NewsController;

$route->add('/', $frontendController, 'index');
$route->add('/admin/home', $backendController, 'profile');
$route->add('/admin/signin', $backendController, 'signin');
$route->add('/admin/signup', $backendController, 'signup');
$route->add('/admin/signout', $backendController, 'signout');
$route->add('/admin/edit', $backendController, 'edit');
$route->add('/admin/sign/exec', $backendController, 'exec');
$route->add('/news', $newsController, 'open');
$route->add('/news/new', $newsController, 'new');
$route->add('/news/edit', $newsController, 'edit');
$route->add('/news/edit/exec', $newsController, 'exec');
$route->submit();
