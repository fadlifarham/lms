<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Video;
use App\Question;
use App\Score;

class Section extends Model
{
    protected $table = 'sections';

    public function video() {
        return $this->hasMany(Video::class);
    }
}
