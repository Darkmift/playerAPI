<?php

// $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");
//     return $response;
// });
//show api rules
$app->get('/api/', 'HomeController:api');
//get All
$app->get('/api/playlist', 'HomeController:getAll');
//get one playlist
$app->get('/api/playlist/{id}', 'HomeController:getOne');
//get songs of playlist
$app->get('/api/playlist/{id}/songs', 'HomeController:playlistSongsAll');
//create playlist
$app->post('/api/playlist', 'HomeController:createPlaylist');
//update playlist name or image
$app->put('/api/playlist/{id}', 'HomeController:updatePlaylist');
//update playlist songs
$app->put('/api/playlist/{id}/songs', 'HomeController:updatePlaylistSongs');
//update playlist name or image
$app->delete('/api/playlist/{id}', 'HomeController:deletePlaylist');
