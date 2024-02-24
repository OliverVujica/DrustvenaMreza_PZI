<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objava;
use Illuminate\Support\Facades\Storage;

class ObjavaController extends Controller
{

    public function show(Objava $objava) {

        return view('objave.show', ['objava' => $objava]);
    }

    public function edit(Objava $objava) {

        //if(auth()->id() !== $objava->user_id) {
        //    abort(404, 'Nemate pravo brisanja ove objave.');
        //}

        $this->authorize('objava.edit', $objava);

        $editing = true;
        return view('objave.show', ['objava' => $objava], ['editing' => $editing]);
    }

    public function store() {

        // Validacija objave, da ne smije biti prazna, minimalno 5 znakova, najvise 500!
        $validated = request()->validate([
            'objava' => 'required|min:3|max:2000',
            'image' => 'image',
            'headline' => 'max:100'
        ]);

        $validated['user_id'] = auth()->id();

        if(request()->has('image')) {
            $imagePath = request('image')->store('objave', 'public');
            $validated['image'] = $imagePath;
        }

        Objava::create($validated);

        // kad nas uspjesno vrati na dashboard, vrati poruku uspjesno!
        return redirect()->route('dashboard')->with('uspjesno', 'Objava uspjesno postavljena.');
    }

    public function destroy(Objava $id) {

        //if(auth()->id() !== $id->user_id) {
        //    abort(404, 'Nemate pravo brisanja ove objave.');
        //}

        $this->authorize('objava.delete', $id);
        
        $id->delete();

        return redirect()->route('dashboard')->with('uspjesno', 'Objava uspjesno izbrisana.');
    }

    public function update(Objava $objava) {

        //if(auth()->id() !== $objava->user_id) {
        //    abort(404, 'Nemate pravo brisanja ove objave.');
        //}

        $this->authorize('objava.edit', $objava);

        $validated = request()->validate([
            'objava' => 'required|min:3|max:2000',
            'image' => 'image',
        ]);

        if(request()->has('image')) {
            $imagePath = request('image')->store('objave', 'public');
            $validated['image'] = $imagePath;
            
            if($objava->image) {
                Storage::delete('public/' . $objava->image);
            }
        }
        
        $objava->update($validated);

        return redirect()->route('objava.show', $objava->id)->with('uspjesno', 'Objava uspjesno uredena.');
    }

}
