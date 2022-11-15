<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Projek;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all()->count();
        $projeks = Projek::all()->count();
        $kontaks = Kontak::all()->count();

        return view('admin.index', compact('siswas', 'projeks', 'kontaks'));
    }
}
