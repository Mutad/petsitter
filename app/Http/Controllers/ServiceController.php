<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Auth;

class ServiceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
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
            'title'=>'required|min:10|string',
            'description'=>'required|min:50|string',
            'cost'=>'required|numeric',
            'payment_per'=>'required|in:night,walk,hour',
        ]);

        Auth::user()->sitter->services()->create($validated);
        return redirect()->route('sitters.show', Auth::user()->sitter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        if (Auth::user()->sitter->id != $service->sitter_id)
            return redirect()->back();

        return view('service.edit', ['service'=>$service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title'=>'required|min:10|string',
            'description'=>'required|min:50|string',
            'cost'=>'required|numeric',
            'payment_per'=>'required|in:night,walk,hour',
        ]);

        $service->update($validated);
        return redirect()->route('sitters.show', Auth::user()->sitter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function delete(Service $service)
    {
        if (Auth::user()->sitter->id == $service->sitter_id)
            $service->delete();
        return redirect()->back();
    }
}
