<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table='masyarakat';
    protected $primaryKey = 'id';
    protected $fillable = ['id','username','nama','password','jenis_kelamin','alamat', 'no_hp', 'id_desa']; //field tabel
    public $timestamps = false;
}
