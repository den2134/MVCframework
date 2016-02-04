<?php
define('DS', DIRECTORY_SEPARATOR); // разделитель для слешов... шиндовс и никсы
define('ROOT', dirname(dirname(__FILE__))); // абсолютный корень проекта.... dirname - получает папку(__FILE__)

require_once(ROOT.DS.'lib'.DS.'init.php');

$router = new Router($_SERVER['REQUEST_URI']);

echo "<pre>";
print_r('Route: '.$router->getRoute().PHP_EOL);
print_r('language: '.$router->getLanguage().PHP_EOL);
print_r('Controller: '.$router->getControler().PHP_EOL);
print_r('Action to be colled: '.$router->getMethodPrefix().$router->getAction().PHP_EOL);
echo "Params: ";
print_r($router->getParams());

