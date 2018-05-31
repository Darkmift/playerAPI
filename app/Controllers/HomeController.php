<?php
namespace App\Controllers;

use App\Models\Playlist;

class HomeController extends Controller
{
    public function api($request, $response)
    {
        return $this->responseMaker($response, $this->APIRules, 201);
    }

    public function getAll($request, $response)
    {
        $playlists = Playlist::select('id', 'name', 'image')->get();
        return $this->responseMaker($response, $this->dbToJsonBuild($playlists, ''), 200);
    }

    public function getOne($request, $response, $args)
    {
        $id = $args['id'];
        $singlePlaylist = Playlist::select('id', 'name', 'image')->where('id', $id)->get();
        if (count($singlePlaylist) < 1 || !is_numeric($id)) {
            return $this->responseMaker($response, $this->dbToJsonBuild('false', "id($id) not found in DB"), 400);
        }
        return $this->responseMaker($response, $this->dbToJsonBuild($this->objBuilder($singlePlaylist), ''), 200);
    }

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
        if ($notice != '') {
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
