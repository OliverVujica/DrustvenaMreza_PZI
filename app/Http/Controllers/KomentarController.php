<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Objava;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Objava $objava) {
        
        $komentar = new Komentar();
        $komentar->objava_id = $objava->id; // ovo je id objave kojoj dodajemo komentar, relacija
        $komentar->user_id = auth()->id();
        $komentar->sadrzaj = request()->get('sadrzaj');
        $komentar->save();

        return redirect()->route('objava.show', $objava->id)->with('success', "Komentar uspjesno objavljen");
    }

    public function destroy($id) {
        $komentar = Komentar::find($id);
        $komentar->delete();

        return redirect()->back()->with('success', "Komentar uspjesno obrisan");
    }
}
