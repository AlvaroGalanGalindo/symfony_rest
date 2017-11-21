<?php

require __DIR__.'/vendor/autoload.php';

$client = new \GuzzleHttp\Client([
    'base_url' => 'http://symfonyrest.dev',
    'defaults' => [
        'exceptions' => false,
    ]
]);

$nickname = 'ObjectOrienter'.rand(0, 999);
$data = array(
    'nickname' => $nickname,
    'avatarNumber' => 5,
    'tagLine' => 'a test dev!'
);

// 1) POST to create a programmer
$response = $client->post('/api/programmers', [
    'body' => json_encode($data)
]);

$programmerUrl = $response->getHeader('Location');

// 2) GET to fetch that programmer
$response = $client->get($programmerUrl);

// 3) GET a collection
$response = $client->get('/api/programmers');

echo $response;
echo "\n\n";
