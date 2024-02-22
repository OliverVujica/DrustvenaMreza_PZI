<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KorisnikController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        $objave = $user->objave()->paginate(5);

        return view('korisnici.show', compact('user', 'objave'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('korisnik.edit', $user);
        $editing = true;
        $objave = $user->objave()->paginate(5);
        return view('korisnici.edit', compact('user', 'editing', 'objave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $this->authorize('korisnik.edit', $user);

        $validated = request()->validate(
            [
                'name' => 'required|min:3|max:40',
                'bio' => 'nullable|min:1|max:255',
                'image' => 'image',
                'password' => 'nullable|min:6|max:100|confirmed'
            ]
            );

            
    if (isset($validated['password'])) {
        
        request()->validate([
            'old_password' => 'required',
        ]);

        if (!Hash::check(request('old_password'), $user->password)) {
            return redirect()->back()->with('error', 'Old password is incorrect.');
        }

        $validated['password'] = bcrypt($validated['password']);
    } else {
        unset($validated['password']);
    }

            if(request()->has('image')) {
                $imagePath = request('image')->store('profile', 'public');
                $validated['image'] = $imagePath;
                
                if($user->image) {
                    Storage::delete('public/' . $user->image);
                }
            }

            $user->update($validated);

            return redirect()->route('profile', $user);
    }

    public function profile() {
        return $this->show(auth()->user());
    }

}
