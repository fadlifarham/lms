<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleCategory extends Model
{
    protected $table = 'module_category';

    protected $fillable = [
        'category'
    ];

    public function module() {
        return $this->hasMany(Module::class, 'category_id');
    }
}
