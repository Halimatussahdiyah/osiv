<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admindesa extends Model
{
    protected $table='admindesa';
    protected $primaryKey = 'id_admin_desa';
    protected $fillable = ['id_admin_desa', 'email', 'password', 'id_desa','jabatan','status','picture', 'creatd_at', 'update_at']; 
    public $timestamps = false;

    public function laporan(){
        return $this->hasMany(Laporan::class, 'id_admin_desa', 'id_admin_desa');
    }

    // function desa(){
    //     return $this->hasOne(Desa::class, 'id', 'id_desa');
    // }
    public function desa(){
        return $this->belongsTo(Desa::class, 'id_desa', 'id');
    }
}
