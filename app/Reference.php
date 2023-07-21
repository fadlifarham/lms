<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'referensi';

    protected $fillable = [
        'module_id', 'reference'
    ];

    public function module() {
        return $this->belongsTo(Module::class);
    }
}
