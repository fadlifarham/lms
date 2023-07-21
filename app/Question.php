<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'module_id', 'ticket_type_id', 'problem', 'option_a', 'option_b', 'option_c', 'option_d', 'answer'
    ];

    public function module() {
        return $this->belongsTo(Module::class);
    }
}
