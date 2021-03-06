<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public $timestamps = false;
    public $table = 'playlists';
    public $fillable = [
        'name',
        'image',
        'songs',
    ];
    protected $casts = [
        'songs' => 'array',
    ];
}
