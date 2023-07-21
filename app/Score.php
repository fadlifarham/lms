<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';

    protected $fillable = [
        'ticket_id', 'module_id', 'correct', 'wrong', 'not_answered', 'type', 'examines'
    ];
}
