<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;
use App\Video;
use App\Question;
use App\Section;
use App\HotQuestion;

class Module extends Model
{
    protected $table = 'modules';

    protected $fillable = [
        'name',
    ];

    public function ticket() {
        return $this->hasMany(Ticket::class, 'modul_id');
    }

    public function module_category() {
        return $this->belongsTo(ModuleCategory::class, 'category_id');
    }

    public function video() {
        return $this->hasMany(Video::class);
    }

    public function question() {
        return $this->hasMany(Question::class);
    }

    public function section() {
        return $this->hasMany(Section::class);
    }

    public function reference() {
        return $this->hasMany(Reference::class);
    }

    public function hot_question() {
        return $this->hasMany(HotQuestion::class);
    }

}
