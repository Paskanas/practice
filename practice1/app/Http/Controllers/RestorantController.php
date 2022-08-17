<?php

namespace App\Http\Controllers;

use App\Models\Restorant;
use App\Http\Requests\StoreRestorantRequest;
use App\Http\Requests\UpdateRestorantRequest;
use Illuminate\Http\Request;

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
        $restorant->title = $request->car_service_address;
        $restorant->city = $request->car_service_phone;
        $restorant->address = $request->car_service_title;
        $restorant->working_time = $request->car_service_title;
        $restorant->save();
        return redirect()->route('restorant-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function show(Restorant $restorant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restorant $restorant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestorantRequest  $request
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestorantRequest $request, Restorant $restorant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restorant $restorant)
    {
        //
    }
}
