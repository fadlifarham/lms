<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Sertifikasi extends Model
{
    protected $table = 'sertifikasi';

    protected $fillable = [
        'user_id', 'kode_sertifikasi_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
