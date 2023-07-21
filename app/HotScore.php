<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotScore extends Model
{
    protected $table = "hot_scores";

    protected $fillable = [
        'ticket_id', 'total'
    ];
}
