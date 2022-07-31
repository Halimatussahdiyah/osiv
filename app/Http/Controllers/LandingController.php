<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view ('landing_page', [
            'beritas' => Berita::where('status', 'dipost')->get()
        ])->with('i');
    }

    public function berita($id)
    {
        return view('detailberita', [
            'id' => $id,
            'berita' => Berita::find($id)
        ])->with('i');
    }

}
