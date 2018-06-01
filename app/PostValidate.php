<?php

namespace App;

class PostValidate
{
    private static $name;
    private static $image;
    private static $songsList;
    private static $song;
    private static $errMsg = array();

    public static function validateName($name)
    {
        self::$name = $name;
        return self::$name;
    }

    public function validateImage($image)
    {
        if (!filter_var($image, FILTER_VALIDATE_URL)) {
            return false;
        }
        return true;
    }

    public function validateSongList($songsList)
    {
        foreach ($songsList as $key => $value) {
            $song = $songsList[$key];
            if (
                count($song) != 2 ||
                !isset($song['name']) ||
                !isset($song['url']) ||
                !filter_var($song['url'], FILTER_VALIDATE_URL)
            ) {
                return false;
            };
        }
        return true;
    }

    public function validateSong($song)
    {
        self::$song = $song;
        return self::$song;
    }

    public function errorMsgAdd($addMsg)
    {
        array_push(self::$errMsg, array($addMsg));
    }

    public function errorMsgBuilder()
    {
        if (!empty(self::$errMsg)) {
            return self::$errMsg;
        }
    }

}
