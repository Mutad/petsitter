<?php

namespace App\Http\Controllers;

use App\Models\Sitter;
use Illuminate\Http\Request;
use Auth;
use Str;

class SitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sitters.all', ['sitters'=>Sitter::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->sitter) {
            return view('sitter.apply');
        } else {
            return redirect()->route('sitters.show', ['sitter' => Auth::user()->sitter]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->sitter) {
            return redirect('/');
        }
        $validator = $request->validate([
            'description'=>'required|min:50',
            'image'=>'file|max:2048'
        ]);

        if ($request->file('image')) {
            $guessExtension = $request->file('image')->guessExtension();
            $validator['image'] = Str::random(40) .'.'.$guessExtension;
            $path = $request->file('image')->storeAs('public/sitters',$validator['image']);
        }

        Auth::user()->sitter()->create($validator);
        return redirect()->route('services.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sitter  $sitter
     * @return \Illuminate\Http\Response
     */
    public function show(Sitter $sitter)
    {
        return view('sitters.single', ['sitter'=>$sitter]);
    }

    public function request(Request $request, Sitter $sitter)
    {
        $validated = $request->validate([
            'hours'=>'required|numeric',
            'hourly_cost'=>'required|numeric',
            'pet_id'=>'required|exists:pets,id'
        ]);

        $validated['pet_confirmed'] = true;
        $validated['reciever_id'] = Auth::user()->id;

        $sitter->orders()->create($validated);

        return redirect('/orders');
    }

    public function imageAdd(Request $request, Sitter $sitter)
    {
        $validated = $request->validate([
            // 'order_id'=>'required|exists:orders,id',
            'image'=>'required|file|max:2048'
        ]);

        $guessExtension = $request->file('image')->guessExtension();
        $validated['image'] = Str::random(40) .'.'.$guessExtension;
        $path = $request->file('image')->storeAs('public/sitterImages', $validated['image']);
        // $validated['sitter_id'] = $order->id;

        $sitter->photos()->create($validated);
        return redirect()->back();
    }
}
