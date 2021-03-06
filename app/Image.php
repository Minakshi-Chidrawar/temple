<?php

namespace App;

use App\Album;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['original', 'thumbnail', 'album_id'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
