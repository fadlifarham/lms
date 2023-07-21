<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module;
use App\User;
use App\TicketType;
use App\CompanyUser;
use App\HotScore;
use App\Company;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'modul_id', 'user_id', 'company_user_id' ,'ticket_type_id', 'start_date', 'end_date', 'progress_in_module', 
        'progress_in_section', 'sertifikasi_chance', 'hot_chance',
    ];

    public function company_user() {
        return $this->belongsTo(CompanyUser::class, 'company_user_id');
    }

    public function module() {
        return $this->belongsTo(Module::class, 'modul_id');
    }

    public function score() {
        return $this->hasMany(Score::class);
    }

    public function ticket_type() {
        return $this->belongsTo(TicketType::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function hot_score() {
        return $this->hasMany(HotScore::class);
    }

    public function company() {
        return $this->belongsToThrough(CompanyUser::class, Company::class);
    }
}
