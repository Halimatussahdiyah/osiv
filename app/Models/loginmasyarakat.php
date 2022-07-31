<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class loginmasyarakat extends Authenticatable
{
    protected $table='masyarakat';
    protected $primaryKey = 'id';
    protected $fillable = ['username','nama','password','jenis_kelamin','alamat', 'no_hp',]; 
    public $timestamps = false;
}
