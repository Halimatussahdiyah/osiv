<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Berita;

class detail_pengaduan extends Model
{
    public function allData()
    {
        return DB::table('tbl_beritas')->get();
    }

    public function detailData($id_admindesa)
    {
        return DB::table('tbl_beritas')->where('id_admindesa', 'id_admindesa')->first();

    }
   
}
