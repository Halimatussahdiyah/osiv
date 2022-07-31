<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table='forums';
    protected $primary='id_forum';
    protected $fillable = ['id_forum', 'pengirim', 'judul_forum', 'deskripsi','foto']; 
    public $timestamps = false;

    public function tanggapi()
    { 
        return $this->hasMany(TanggapiForum::class, 'id_forums', 'id_forum');
    }
}
