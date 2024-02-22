<?php

namespace App\Http\Controllers;

use App\Models\Objava;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $user = auth()->user();

        $followingIDs = $user->followings()->pluck('user_id');

        $objava = Objava::whereIn('user_id', $followingIDs)->latest();

        if(request()->has('search')) {
            $objava = $objava->where('objava', 'like', '%' . request()->get('search', '') . '%');
        }

        return view('dashboard', [
            'objave' => $objava->paginate(5) // za paginaciju u laravelu koristim jednostavnu funkciju paginate u koju kao argument mogu ubaciti koliko zelim objava po stranici 
        ]);
    }
}
