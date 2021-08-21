<?php
use Tygh\Registry;
define('AREA', 'A');
require 'init.php';

$config = Registry::get('config');
$url = $config['http_host'];
if (!empty($config['http_path'])) {
    $url .= $config['http_path'];
}

db_query('update ?:companies set storefront = ?s, secure_storefront = ?s', $url, $url);
db_query('update ?:storefronts set url = ?s', $url);

die('done');