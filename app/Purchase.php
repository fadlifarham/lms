<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Module;

class Purchase extends Model
{
    protected $table = 'purchases';

    protected $fillable = [
        'user_id', 'module_id', 'ticket_type_id', 'price', 'total_ticket', 'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function module() {
        return $this->belongsTo(Module::class);
    }
}
