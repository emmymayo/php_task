<?php

require 'lib/redbean/rb-mysql.php';


R::setup( 'mysql:host=localhost;dbname=php_task','root', '' );
R::debug();

// SET PATHS

define('ROOTPATH', __DIR__);
define('BASEURL', 'http://localhost/php_task/');
