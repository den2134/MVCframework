<?php

Config::set('site_name', 'MVC Framework');
Config::set('languages', array('en', 'fr'));

Config::set('routes', array(
    'default' => '',
    'admin' => 'admin',
));

Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');

Config::set('db.host', 'localhost');
Config::set('db.login', 'root');
Config::set('db.password', '');
Config::set('db.name', 'mvc');