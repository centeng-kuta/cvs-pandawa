<?php
error_reporting(E_ERROR);
session_start();
include '../libs/bootstrap.php';

parse_str($_SERVER['QUERY_STRING'], $GLOBAL_PARAMS);
$count_qs = count($GLOBAL_PARAMS);
$__additional_javascripts = null;

if ($count_qs == 0) {
    include APP_BACKEND_DIR_USER.'Dashboard'.DS.'login.php';
} else {
    $module_path = $GLOBAL_PARAMS['q'];
    include APP_BACKEND_DIR_USER.$module_path;
}
