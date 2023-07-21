<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusCompany extends Model
{
    protected $table = 'status_company';

    protected $fillable = [
        'name'
    ];
}
