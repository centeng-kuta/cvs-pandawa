<?php
/*
* Base App configuration
*/

define('DS', DIRECTORY_SEPARATOR);

define('BASE_URL', 'http://hris.local/');
// define('BASE_URL', 'http://192.168.1.168/');

define('ASSETS_BACKEND_URL', BASE_URL.'assets/backend/');
define('ASSETS_FRONTEND_URL', BASE_URL.'assets/frontend/');

define('ROOT_DIR', dirname(dirname(dirname(__FILE__))));
define('APP_DIR', ROOT_DIR.DS.basename(dirname(dirname(__FILE__))));
define('APP_BACKEND_DIR', APP_DIR.DS.'app_admin'.DS);
define('APP_FRONTEND_DIR', APP_DIR.DS.'app_front'.DS);

define('APP_BACKEND_DIR_USER', APP_DIR.DS.'app_user'.DS);

/*
* Email configuration
*/

define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', '465');
define('SMTP_EMAIL_USERNAME', 'leave.app@gmail.com');
define('SMTP_EMAIL_PASSWORD', 'n3wlif3v3ry600d');
define('SENDER_EMAIL', 'leave.app@gmail.com');
define('SENDER_NAME', 'LeaveSystem');

require 'conn.php';
require 'common.php';
require APP_DIR.DS.'vendor'.DS.'autoload.php';