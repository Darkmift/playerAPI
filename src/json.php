<?php
$baseUrl = "http://" . $_SERVER['SERVER_NAME'] . "/";
$allAlbums = array();
$directory = __DIR__;
echo '<pre>';
$dirlist = scandir($directory);
foreach ($dirlist as $musicDir) {
    if (is_numeric($musicDir[0])) {
        $albumObj = new stdClass();
        $albumObj->{'name'} = $musicDir;
        $albumObj->{'image'} = $baseUrl . basename($directory) . '/' . 'defaultAlbumCover.jpg';
        $albumObj->{'songs'} = "";
        $songDir = scandir($musicDir);
        $songList = array();
        foreach ($songDir as $song => $value) {
            if (is_numeric($value[0])) {
                $url = $baseUrl . basename($directory) . '/' . $musicDir . '/' . $value;
                $url = str_replace(' ', '%20', $url);
                //$url = htmlentities($url);
                $songArr = array(
                    'name' => $value,
                    'url' => $url,
                );
                array_push($songList, $songArr);
            }
        }
        $albumObj->songs = $songList;
        array_push($allAlbums, $albumObj);
    }
}
echo json_encode($allAlbums, JSON_PRETTY_PRINT);
