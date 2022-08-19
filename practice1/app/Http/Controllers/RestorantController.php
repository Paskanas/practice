<?php

namespace App\Http\Controllers;

use App\Models\Restorant;
use App\Http\Requests\StoreRestorantRequest;
use App\Http\Requests\UpdateRestorantRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RestorantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restorants = Restorant::all();
        return view('restorant.index', ['restorants' => $restorants, 'title' => 'Restorant list']);
    }

    public function indexJs()
    {
        $restorants = Restorant::all();
        return Inertia::render('Restorants', [
            'restorants' => $restorants,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restorant.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Restorant  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restorant = new Restorant;
        $restorant->title = $request->restorant_title;
        $restorant->city = $request->restorant_city;
        $restorant->address = $request->restorant_address;
        $restorant->working_time = $request->restorant_working_time;
        $restorant->save();
        return redirect()->route('restorants-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function show(int $restorantId)
    {
        $restorant = Restorant::where('id', $restorantId)->first();
        return view('restorant.show', ['restorant' => $restorant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function edit(restorant $restorant)
    {
        return view('restorant.edit', ['restorant' => $restorant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestorantRequest  $request
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restorant $restorant)
    {
        $restorant->title = $request->restorant_title;
        $restorant->city = $request->restorant_city;
        $restorant->address = $request->restorant_address;
        $restorant->working_time = $request->restorant_working_time;
        $restorant->save();
        return redirect()->route('restorants-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restorant $restorant)
    {
        $restorant->delete();
        return redirect()->route('restorants-index');
    }
}
