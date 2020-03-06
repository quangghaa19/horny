<?php

// Define links
define('PATH_SYSTEM', __DIR__ .'/system');
define('PATH_APPLICATION', __DIR__ . '/admin');
define('PATH_VIEW', __DIR__ . 'public');

// Get system config
require (PATH_SYSTEM . '/config/config.php');

// Include Common file 
include_once PATH_SYSTEM . '/core/Common.php';

// Run function in Common file
load();