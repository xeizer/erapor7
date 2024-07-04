<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Ttd extends Model
{
    public $fillable = ['guru_id', 'tampil', 'lokasi'];
    public function guru()
    {
        return $this->hasOne(Guru::class, 'guru_id', 'guru_id');
    }
}
