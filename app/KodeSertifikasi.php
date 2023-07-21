<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module;

class KodeSertifikasi extends Model
{
    protected $table = 'kode_sertifikasi';

    protected $fillable = [
        'module_id', 'kode', 'status', 'training_date'
    ];

    public function module() {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
