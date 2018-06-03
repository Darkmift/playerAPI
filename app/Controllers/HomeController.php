<?php
namespace App\Controllers;

use App\Models\Playlist;
use App\PostValidate;

class HomeController extends Controller
{
    //get API
    public function api($request, $response)
    {
        return $this->responseMaker($response, $this->APIRules, 200);
    }

    //get All
    public function getAll($request, $response)
    {
        $playlists = Playlist::select('id', 'name', 'image')->get();
        if (count($playlists) < 1) {
            return $this->responseMaker($response, $this->dbToJsonBuild(true, $playlists, "there are no playlists in DB"), 200);
        }
        return $this->responseMaker($response, $this->dbToJsonBuild(true, $playlists, ''), 200);
    }

    //get one playlist
    public function getOne($request, $response, $args)
    {
        $id = $args['id'];
        $singlePlaylist = Playlist::select('id', 'name', 'image')->where('id', $id)->get();
        if (count($singlePlaylist) < 1 || !is_numeric($id)) {
            return $this->responseMaker($response, $this->dbToJsonBuild(false, 'false', "id($id) not found in DB"), 400);
        }
        return $this->responseMaker($response, $this->dbToJsonBuild(true, $this->objBuilder($singlePlaylist), ''), 200);
    }

    //get all songs of playlist
    public function playlistSongsAll($request, $response, $args)
    {
        $id = $args['id'];
        $songs = Playlist::select('songs')->where('id', $id)->get();
        $object = new \stdClass();
        $object->songs = array();

        if (count($songs) < 1 || !is_numeric($id)) {
            if (!Playlist::where('id', $id)->exists()) {
                return $this->responseMaker($response, $this->dbToJsonBuild(false, $object, "playlist with id($id) does not exists"), 400);
            }
        }

        if ($songs->toArray()['0']['songs'] == "") {
            return $this->responseMaker($response, $this->dbToJsonBuild(false, $object, "songs list for playlist with id($id) is empty"), 200);
        }
        return $this->responseMaker($response, $this->dbToJsonBuild(true, $this->objBuilder($songs), ''), 200);
    }

    //make a playlist
    public function createPlaylist($request, $response)
    {
        //get post json
        $postJson = $request->getParsedBody();
        //if post not valid json
        if ($postJson === null) {
            PostValidate::errorMsgAdd("the post request for new playlist requires a proper JSON object");
            PostValidate::errorMsgAdd("please consult the API guidlines here: $this->fullUrl/api");
            return $this->responseMaker(
                $response,
                json_encode(PostValidate::errorMsgBuilder()),
                400
            );
        }

        if (count($postJson) != 3) {
            PostValidate::errorMsgAdd("incorrect request object length");
        }

        //validate playlist name
        if (!isset($postJson['name'])) {
            PostValidate::errorMsgAdd("request obj is missing name key!");
        }

        //validate playlist image
        if (!isset($postJson['image'])) {
            PostValidate::errorMsgAdd("request obj is missing image key!");
        } else {
            if (!PostValidate::validateImage($postJson['image'])) {
                PostValidate::errorMsgAdd("playlist image must be a valid url!");
            }
        }
        //die('image stop');
        //validate playlist songs
        if (!isset($postJson['songs'])) {
            PostValidate::errorMsgAdd("request obj is missing songs key!");
        } else {
            if (!is_array($postJson['songs'])) {
                PostValidate::errorMsgAdd("playlist songs must be a valid array!");
            } else {
                //validate songs array structure
                $songs = $postJson['songs'];
                if (!PostValidate::validateSongList($postJson['songs'])) {
                    PostValidate::errorMsgAdd("each song must be an array of object{name:string and url:valid url}");
                }
            }
        }
        //check duplicate song/url pair
        if (
            count($postJson['songs']) !=
            count(array_unique($postJson['songs'], SORT_REGULAR))
        ) {
            PostValidate::errorMsgAdd("two or more duplicate songs detected,change either name or url");
        }

        if (!empty(PostValidate::errorMsgBuilder())) {
            PostValidate::errorMsgAdd("please consult the API guidlines here: $this->fullUrl/api");
            return $this->responseMaker(
                $response,
                json_encode(PostValidate::errorMsgBuilder()),
                400
            );
        }

        //graveyard chunk 1
        try {
            $playlist = Playlist::create([
                'name' => $postJson['name'],
                'image' => $postJson['image'],
                'songs' => $postJson['songs'],
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                PostValidate::errorMsgAdd("error 1062,the playlist name is already assigned in DB to another playlist");
                PostValidate::errorMsgAdd("please consult the API guidlines here: $this->fullUrl/api");
                return $this->responseMaker(
                    $response,
                    $this->dbToJsonBuild(false, PostValidate::errorMsgBuilder(), ''),
                    400
                );
            } else {
                return $this->responseMaker(
                    $response,
                    $this->dbToJsonBuild(false, $e, ''),
                    400
                );
            }
        }
        return $this->responseMaker($response, $this->dbToJsonBuild(true, $playlist->id, ''), 201);
    }

    //update a playlist
    public function updatePlaylist($request, $response, $args)
    {
        $id = $args['id'];
        if (!is_numeric($id)) {
            return $this->responseMaker($response, $this->dbToJsonBuild(false, 'false', "id($id) not found in DB"), 400);
        }

        $record = Playlist::find($id);
        if (!isset($record)) {
            PostValidate::errorMsgAdd("id($id) is not in DB,update aborted");
            return $this->responseMaker(
                $response,
                $this->dbToJsonBuild(false, PostValidate::errorMsgBuilder(), ''),
                400
            );

        }
        //get post json
        $putJson = $request->getParsedBody();
        //if post not valid json
        if ($putJson === null) {
            PostValidate::errorMsgAdd("the put request for new playlist requires a proper JSON object");
            PostValidate::errorMsgAdd("please consult the API guidlines here: $this->fullUrl/api");
            return $this->responseMaker(
                $response,
                json_encode(PostValidate::errorMsgBuilder()),
                400
            );
        }

        if (count($putJson) > 2) {
            PostValidate::errorMsgAdd("incorrect request object length,must have ,at most, name and image keys");
        }

        //init eloquent update array
        $updateArray = array();
        //validate playlist name
        if (!isset($putJson['name'])) {
            PostValidate::errorMsgAdd("request obj is missing name key!");
        } else {
            $updateArray["name"] = $putJson['name'];
        }

        //validate playlist image
        if (!isset($putJson['image'])) {
            PostValidate::errorMsgAdd("request obj is missing image key!");
        } else {
            if (!PostValidate::validateImage($putJson['image'])) {
                PostValidate::errorMsgAdd("playlist image must be a valid url!");
            } else {
                $updateArray["image"] = $putJson['image'];
            }
        }

        if (!empty(PostValidate::errorMsgBuilder())) {
            PostValidate::errorMsgAdd("please consult the API guidlines here: $this->fullUrl/api");
            return $this->responseMaker(
                $response,
                json_encode(PostValidate::errorMsgBuilder()),
                400
            );
        }

        try {
            $playlist = Playlist::where('id', $id)->update($updateArray);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                PostValidate::errorMsgAdd("error 1062,the playlist name is already assigned in DB to another playlist");
                PostValidate::errorMsgAdd("please consult the API guidlines here: $this->fullUrl/api");
                return $this->responseMaker(
                    $response,
                    $this->dbToJsonBuild(false, PostValidate::errorMsgBuilder(), ''),
                    400
                );
            } else {
                return $this->responseMaker(
                    $response,
                    $this->dbToJsonBuild(false, $e, ''),
                    400
                );
            }
        }
        return $this->responseMaker($response, $this->dbToJsonBuild(true, false, ''), 200);
    }

    //update playlist songs
    public function deletePlaylist($request, $response, $args)
    {
        $id = $args['id'];
        if (!is_numeric($id)) {
            return $this->responseMaker($response, $this->dbToJsonBuild(false, 'false', "id($id) not found in DB,delete failed"), 400);
        }

        $record = Playlist::find($id);
        if (!isset($record)) {
            PostValidate::errorMsgAdd("id($id) is not in DB,delete failed");
            return $this->responseMaker(
                $response,
                $this->dbToJsonBuild(false, PostValidate::errorMsgBuilder(), ''),
                400
            );
        }

        //db update songs
        try {
            $playlist = Playlist::find($id);
            $playlist->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->responseMaker(
                $response,
                $this->dbToJsonBuild(false, $e, ''),
                400
            );
        }
        return $this->responseMaker($response, $this->dbToJsonBuild(true, false, ''), 200);
    }

    //update playlist songs
    public function updatePlaylistSongs($request, $response, $args)
    {
        $id = $args['id'];
        if (!is_numeric($id)) {
            return $this->responseMaker($response, $this->dbToJsonBuild(false, 'false', "id($id) not found in DB"), 400);
        }

        $record = Playlist::find($id);
        if (!isset($record)) {
            PostValidate::errorMsgAdd("id($id) is not in DB,update aborted");
            return $this->responseMaker(
                $response,
                $this->dbToJsonBuild(false, PostValidate::errorMsgBuilder(), ''),
                400
            );

        }
        //get post json
        $putJson = $request->getParsedBody();
        //if post not valid json
        if ($putJson === null) {
            PostValidate::errorMsgAdd("the put request for new playlist requires a proper JSON object");
            PostValidate::errorMsgAdd("please consult the API guidlines here: $this->fullUrl/api");
            return $this->responseMaker(
                $response,
                json_encode(PostValidate::errorMsgBuilder()),
                400
            );
        }

        if (count($putJson) < 1) {
            PostValidate::errorMsgAdd("incorrect request object length,must have at least one song array");
        }

        //init eloquent update array
        $updateArray = array();
        //validate playlist songs
        if (!isset($putJson['songs'])) {
            PostValidate::errorMsgAdd("request obj is missing songs key!");
        } else {
            if (!is_array($putJson['songs'])) {
                PostValidate::errorMsgAdd("playlist songs must be a valid array!");
            } else {
                //validate songs array structure
                $songs = $putJson['songs'];
                if (!PostValidate::validateSongList($putJson['songs'])) {
                    PostValidate::errorMsgAdd("each song must be an array of object{name:string and url:valid url}");
                }
            }
        }
        //check duplicate song/url pair
        if (
            count($putJson['songs']) !=
            count(array_unique($putJson['songs'], SORT_REGULAR))
        ) {
            PostValidate::errorMsgAdd("two or more duplicate songs detected,change either name or url");
        }

        if (!empty(PostValidate::errorMsgBuilder())) {
            PostValidate::errorMsgAdd("please consult the API guidlines here: $this->fullUrl/api");
            return $this->responseMaker(
                $response,
                json_encode(PostValidate::errorMsgBuilder()),
                400
            );
        }
        //db update songs
        try {
            $playlist = Playlist::where('id', $id)->update([
                "songs" => json_encode($putJson['songs']),
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->responseMaker(
                $response,
                $this->dbToJsonBuild(false, $e, ''),
                400
            );
        }
        return $this->responseMaker($response, $this->dbToJsonBuild(true, false, ''), 200);
    }

    //helper functions
    private function responseMaker($response, $content, $status)
    {
        $response = $response->withHeader('Content-type', 'application/json');
        $response = $response->withStatus($status);
        $body = $response->getBody();
        $body->write($content);
        return $response;
    }

    private function dbToJsonBuild($successState, $dbOBJ, $notice)
    {
        $output = new \stdClass();
        $output->success = $successState;
        if ($dbOBJ === 'false') {
            $dbOBJ = false;
        }
        if ($notice != '') {
            $output->notice = $notice;
        }
        if ($dbOBJ) {
            $output->data = $dbOBJ;
        }
        return json_encode($output);
    }

    private function objBuilder($param)
    {
        $object = new \stdClass();
        foreach ($param as $key => $value) {
            $object->$key = $value;
        }
        return current($object);
    }
}
