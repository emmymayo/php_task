<?php

use Stripe\StripeClient;

require 'lib/redbean/rb-mysql.php';


R::setup( 'mysql:host=localhost;dbname=php_task','root', '' );
R::debug(false);

// SET PATHS

define('ROOTPATH', __DIR__);
define('BASEURL', 'http://localhost/php_task/');
define('STRIPE_API_KEY', 'sk_test_51IWQUwH8oljXErmds28KftkL6o6jYIcPgYbBdfEmCPSuAlIh0fgoS4NADcCmsIZbdQ3p5nbAeCOcGkSmo38U9BIe00BdOenrqo');
define('STRIPE_PUBLIC_KEY', 'pk_test_51IWQUwH8oljXErmdg6L4MhsuB6tDdmumlHFfyNaopty2U27pmRcqMX1c868zn838lGQtU1eYV6bKRSQtMFWf36VT00aNsvnTOE');
define('STRIPE_SUCCESS_URL',BASEURL.'stripe_checkout/success');
define('STRIPE_CANCEL_URL',BASEURL.'stripe_checkout/cancel');


// LOAD STRIPE CLIENT

require 'lib/stripe-php-7.108.0/init.php';


