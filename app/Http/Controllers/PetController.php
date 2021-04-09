<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Auth;
use Str;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->type) {
            $pets = Pet::where('type', 'LIKE', $request->type)->paginate(9);
        } else {
            $pets = Pet::paginate(9);
        }
        return view('pets.all', ['pets'=>$pets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'type'=>'required|in:cat,dog',
            'weight'=>'required|numeric',
            'hourly_rate'=>'required|numeric',
            'image'=>'file|max:2048',
        ]);

        if ($request->file('image')) {
            $guessExtension = $request->file('image')->guessExtension();
            $validated['image'] = Str::random(40) .'.'.$guessExtension;
            $path = $request->file('image')->storeAs('public/pets', $validated['image']);
        }
        $pet = Auth::user()->pets()->create($validated);
        return redirect()->route('pets.show', $pet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        return view('pets.single', ['pet'=>$pet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        if (Auth::user()->id == $pet->owner_id) {
            return view('pets.edit', ['pet'=>$pet]);
        } else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        if (Auth::user()->id != $pet->owner_id) {
            return redirect('/');
        }
        $validated = $request->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'type'=>'required|in:cat,dog',
            'weight'=>'required|numeric',
            'hourly_rate'=>'required|numeric',
            'image'=>'file|image|max:2048',
        ]);

        if ($request->file('image')) {
            $guessExtension = $request->file('image')->guessExtension();
            $validated['image'] = Str::random(40) .'.'.$guessExtension;
            $path = $request->file('image')->storeAs('public/pets', $validated['image']);
        }

        $pet->update($validated);
        return redirect()->route('pets.show', $pet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function delete(Pet $pet)
    {
        if (Auth::user()->id == $pet->owner_id || Auth::user()->admin) {
            $pet->delete();
        }
        return redirect('/');
    }

    public function sit(Request $request, Pet $pet)
    {
        $validated = $request->validate([
            'hours'=>'required|numeric'
        ]);

        $validated['pet_id'] = $pet->id;
        $validated['reciever_id'] = $pet->owner_id;
        $validated['hourly_cost'] = $pet->hourly_rate;
        $validated['sitter_confirmed'] = true;

        Auth::user()->sitter->orders()->create($validated);

        return redirect('/orders');
    }
}
