<?php
namespace App\Controllers;

use App\Models\Playlist;

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
            return $this->responseMaker($response, $this->dbToJsonBuild($playlists, "there are no playlists in DB"), 200);
        }
        return $this->responseMaker($response, $this->dbToJsonBuild($playlists, 'huh?'), 200);
    }

    //get one playlist
    public function getOne($request, $response, $args)
    {
        $id = $args['id'];
        $singlePlaylist = Playlist::select('id', 'name', 'image')->where('id', $id)->get();
        if (count($singlePlaylist) < 1 || !is_numeric($id)) {
            return $this->responseMaker($response, $this->dbToJsonBuild('false', "id($id) not found in DB"), 400);
        }
        return $this->responseMaker($response, $this->dbToJsonBuild($this->objBuilder($singlePlaylist), ''), 200);
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
                return $this->responseMaker($response, $this->dbToJsonBuild($object, "playlist with id($id) does not exists"), 400);
            }
        }

        if ($songs->toArray()['0']['songs'] == "") {
            return $this->responseMaker($response, $this->dbToJsonBuild($object, "songs list for playlist with id($id) is empty"), 200);
        }
        return $this->responseMaker($response, $this->dbToJsonBuild($this->objBuilder($songs), ''), 200);
    }

    //make a playlist
    public function createPlaylist($request, $response)
    {
        //get post json
        $postJson = $request->getParsedBody();
        //if post not valid json
        if ($postJson === null) {
            return $this->responseMaker(
                $response,
                json_encode(array("error" => "the post request for new playlist requires a proper JSON object,please visit $this->fullUrl./api for guidlines")),
                400
            );
        }
        //init errMsg array
        $errMsg = array();
        //validate playlist name
        if (!isset($postJson['name'])) {
            array_push($errMsg, array("playlist name is required!"));
        }
        //validate playlist image
        if (!isset($postJson['image'])) {
            array_push($errMsg, array("playlist image is required!"));
        } else {
            if (!filter_var($postJson['image'], FILTER_VALIDATE_URL)) {
                array_push($errMsg, array("playlist image must be a valid url!"));
            }
        }
        //validate playlist songs
        if (!isset($postJson['songs'])) {
            array_push($errMsg, array("playlist songs array is required!"));
        } else {
            if (!is_array($postJson['songs'])) {
                array_push($errMsg, array("playlist songs must be a valid array!"));
            } else {
                //validate songs array structure
                $songs = $postJson['songs'];
                foreach ($songs as $key => $value) {
                    $song = $songs[$key];
                    if (
                        count($song) != 2 ||
                        !isset($song['name']) ||
                        !isset($song['url']) ||
                        !filter_var($song['url'], FILTER_VALIDATE_URL)
                    ) {
                        array_push($errMsg, array("each song must be an array of name:string and url:valid url"));
                    };
                }
            }
        }

        if (
            count($postJson['songs']) !=
            count(array_unique($postJson['songs'], SORT_REGULAR))
        ) {
            array_push($errMsg, array("two or more duplicate songs detected,change either name or url"));
        }
        //graveyard chunk 1
        if (!empty($errMsg)) {
            array_push($errMsg, array("for more info please visit $this->fullUrl./api for guidlines"));
            return $this->responseMaker(
                $response,
                json_encode($errMsg),
                400
            );
        }

        $playlist = Playlist::create([
            'name' => $postJson['name'],
            'image' => $postJson['image'],
            'songs' => $postJson['songs'],
        ]);
        var_dump($playlist->id);
        die();
        return $this->responseMaker($response, $this->dbToJsonBuild($this->objBuilder($postParam), ''), 201);
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

    private function dbToJsonBuild($dbOBJ, $notice)
    {
        $output = new \stdClass();
        $output->success = true;
        if ($dbOBJ === 'false') {
            $dbOBJ = false;
        }
        if (strlen($notice) > 1) {
            $output->notice = $notice;
        }
        $output->notice = $notice;
        $output->data = $dbOBJ;
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
