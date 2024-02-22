<?php

namespace App\Http\Controllers;

use App\Models\Objava;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function like(Objava $objava) {
        $liker = auth()->user();

        $liker->likes()->attach($objava);

        return redirect()->route('dashboard');
    }

    public function dislike(Objava $objava) {
        $liker = auth()->user();

        $liker->likes()->detach($objava);

        return redirect()->route('dashboard');
    }
}
