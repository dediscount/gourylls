<?php
//http://localhost/gourylls
if (!defined('PATH')) {
    define('PATH', '/gourylls');
}
if (!defined('JS_PATH')) {
    define('JS_PATH', PATH . '/public/js/');
}
if (!defined('CSS_PATH')) {
    define('CSS_PATH', PATH . '/public/css/');
}

if (!defined('UPLOAD_PATH')) {
    define('UPLOAD_PATH', PATH . '/public/uploads/');
}

if (!defined('ICON_PNG')) {
    define('ICON_PNG', PATH . '/public/uploads/default_icon.png');
}

//D:/xampp/htdocs/gourylls/...
if (!defined('UPLOAD_MAPPING')) {
    define('UPLOAD_MAPPING', dirname(__FILE__) . '/public/uploads/');
}

if (!defined('ICON_MAPPING')) {
    define('ICON_MAPPING', dirname(__FILE__) . '/public/uploads/');
}
?>

