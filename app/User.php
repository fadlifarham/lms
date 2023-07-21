<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\CompanyUser;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status_id', 'free_ticket_taken'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function company_user() {
        return $this->hasOne(CompanyUser::class);
    }
}
