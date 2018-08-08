<?php
require __DIR__.'/../vendor/autoload.php';
use \FormLib\FormUtilities;
FormUtilities::verifyToken();
echo 'If ok proceed';