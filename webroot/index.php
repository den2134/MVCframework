<?php
define('DS', DIRECTORY_SEPARATOR); // разделитель для слешов... шиндовс и никсы
define('ROOT', dirname(dirname(__FILE__))); // абсолютный корень проекта.... dirname - получает папку(__FILE__)

require_once(ROOT.DS.'lib'.DS.'init.php');

$router = new Router($_SERVER['REQUEST_URI']);

App::run($_SERVER['REQUEST_URI']);

