<?php

// $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");
//     return $response;
// });
//show api rules
$app->get('/api/', 'HomeController:api')->setName('home');
//get All
$app->get('/api/playlist', 'HomeController:getAll')->setName('home');
//get one playlist
$app->get('/api/playlist/{id}', 'HomeController:getOne')->setName('home');
//get songs of playlist
$app->get('/api/playlist/{id}/songs', 'HomeController:playlistSongsAll')->setName('home');
