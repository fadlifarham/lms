<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module;
use App\Ticket;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'module_id', 'ticket_type_id' , 'name', 'code',
    ];

    public function module() {
        return $this->belongsTo(Module::class);
    }

    public function ticket() {
        return $this->hasOne(Ticket::class);
    }
}
