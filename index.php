<?php

require 'vendor/autoload.php';

$env = new \Dotenv\Dotenv('.');

$env->load();

$url = getenv('DEFAULT_URL');

$token = getenv('DEFAULT_TOKEN');

$firebase = new \Firebase\FirebaseLib($url, $token);

header('Content-Type: application/json');

if (array_key_exists('temperature', $_GET)) {
    $firebase->set('/', [
        'dht11' => [
            'temperature' => $_GET['temperature']
        ]
    ]);
}

print $firebase->get('/');