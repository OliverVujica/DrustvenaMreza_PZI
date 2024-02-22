<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objava;

class DashboardController extends Controller
{
    public function index()
    {    
        $objava = Objava::with('user', 'komentari.user')->orderBy('created_at', 'desc');

        if(request()->has('search')) {
            $objava = $objava->where('objava', 'like', '%' . request()->get('search', '') . '%');
        }

        return view('dashboard', [
            'objave' => $objava->paginate(5) // za paginaciju u laravelu koristim jednostavnu funkciju paginate u koju kao argument mogu ubaciti koliko zelim objava po stranici 
        ]);
    }
}
