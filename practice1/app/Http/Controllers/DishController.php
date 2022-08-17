<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Restorant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('dish.index', ['dishes' => $dishes, 'title' => 'Dishes']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restorants = Restorant::all();
        return view('dish.create', ['restorants' => $restorants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dish = new Dish;

        if ($request->file('dish_photo')) {

            $photo = $request->file('dish_photo');

            $ext = $photo->getClientOriginalExtension();

            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;

            // $Image = Image::make($photo)->pixelate(12);

            // $Image->save(public_path() . '/images' . $file);

            $photo->move(public_path() . '/images', $file);

            $dish->photo = asset('/images') . '/' . $file;
        }

        $dish->restorant_id = $request->restorant_id;
        $dish->title = $request->title;
        $dish->price = $request->price;
        $dish->save();
        return redirect()->route('dishes-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $restorants = Restorant::all();
        return view('dish.edit', ['dish' => $dish, 'restorants' => $restorants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $name = pathinfo($dish->photo, PATHINFO_FILENAME);
        $ext = pathinfo($dish->photo, PATHINFO_EXTENSION);

        $path = asset('/images') . '/' . $name . '.' . $ext;

        if (file_exists($path)) {
            unlink($path);
        }

        if ($request->file('dish_photo')) {

            $photo = $request->file('dish_photo');

            $ext = $photo->getClientOriginalExtension();

            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;

            $photo->move(public_path() . '/images', $file);

            $dish->photo = asset('/images') . '/' . $file;
        }


        $dish->restorant_id = $request->restorant_id;
        $dish->title = $request->title;
        $dish->price = $request->price;
        $dish->save();
        return redirect()->route('dishes-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }

    public function deletePicture(Dish $dish)
    {
        $name = pathinfo($dish->photo, PATHINFO_FILENAME);
        $ext = pathinfo($dish->photo, PATHINFO_EXTENSION);

        $path = asset('/images') . '/' . $name . '.' . $ext;
        // dd($path);
        if (file_exists($path)) {
            unlink($path);
        }

        $dish->photo = null;
        $dish->save();
        return redirect()->back();
    }
}
