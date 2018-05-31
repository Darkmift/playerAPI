<?php

namespace App;

class PostValidate
{
    private static $name;
    private static $image;
    private static $songsList;
    private static $song;

    public static function validateName($name)
    {
        self::$name = $name;
        return self::$name;
    }

    public function validateImage($image)
    {
        self::$image = $image;
        return self::$image;
    }

    public function validateSongList($songsList)
    {
        self::$songsList = $songsList;
        return self::$songsList;
    }

    public function validateSong($song)
    {
        self::$song = $song;
        return self::$song;
    }
}
