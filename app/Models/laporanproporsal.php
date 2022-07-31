<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanproporsal extends Model
{
    use HasFactory;
     protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'id_admin_desa',
        'judul_laporan',
        'file_laporan',
        'file_laporan', 'tipe',
        'tanggal'
     ];

    public function admin_desa() {
        return $this->belongsTo(
            Admindesa::class,
            'id_admin_desa',
            'id_admin_desa'
        );
    }
}
