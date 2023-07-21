<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StatusCompany;
use App\Company;
use App\User;
use App\Ticket;

class CompanyUser extends Model
{
    protected $table = 'companyuser';

    protected $fillable = [
        'user_id', 'company_id', 'status_company_id',
    ];

    public function status_company() {
        return $this->belongsTo(StatusCompany::class, 'status_company_id');
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ticket() {
        return $this->hasOne(Ticket::class);
    }
}
