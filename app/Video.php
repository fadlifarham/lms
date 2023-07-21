<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'module_id', 'title', 'description', 'link', 'type,'
    ];

    public function module() {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
