<?php
// load Doctrine library
require_once APPPATH.'third_party/doctrine/Doctrine.php';

$doctrine_bootstrap = new Doctrine;
$doctrine_bootstrap->setUpApplication();
