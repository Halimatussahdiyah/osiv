<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class loginadmindesa extends Authenticatable
{
    protected $table='admindesa';
    protected $primaryKey = 'id_admin_desa';
    protected $fillable = ['id_admin_desa', 'username', 'password']; 
    public $timestamps = false;
    public function desa(){
        return $this->belongsTo(Desa::class, 'id_desa', 'id');
    }
}
