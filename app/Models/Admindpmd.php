<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admindpmd extends Model
{
    protected $table='admindpmd';
    protected $primaryKey = 'id_admin_dpmd';
    protected $fillable = ['id_admin_dpmd', 'username', 'password', 'creatd_at', 'update_at']; 
    public $timestamps = false;
}
