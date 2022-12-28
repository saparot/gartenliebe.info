#!/usr/bin/php
<?php
$configKeys = [
    'APP_ENV',
    'APP_KEY',
    'APP_DEBUG',
    'APP_NAME',
    'APP_URL',
    'DB_CONNECTION',
    'DB_DATABASE',
    'DB_HOST',
    'DB_PASSWORD',
    'DB_PORT',
    'DB_USERNAME',
];

$envFile = dirname(__FILE__) . '/.env';

$data = "";
foreach ($configKeys as $key) {
    $data .= sprintf("%s=%s\n", $key, getenv($key));
}

file_put_contents($envFile,$data);
echo "updated env file:  $envFile\n";
