<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Restorant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

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

    public function indexJs()
    {

        $dishes = Dish::all();
        foreach ($dishes as &$dish) {
            $dish['restorantTitle'] = $dish->getDishRestorants->title;
        }
        return Inertia::render('Dishes', [
            'dishes' => $dishes,
        ]);
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
    public function show(int $dishId)
    {
        $dish = Dish::where('id', $dishId)->first();
        return view('dish.show', ['dish' => $dish]);
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
    public function saveRating(Request $request, Dish $dish)
    {
        dump($dish);
        $dish->rating_sum += $request->value;
        dump($dish->rating_sum);
        $dish->rating_count++;
        $dish->rating = $dish->rating_sum / $dish->rating_count;
        if ($dish->rated_by === '') {
            $dish->rated_by = $request->userId;
        } else {
            $dish->rated_by .= ",$request->userId";
        }
        $dish->save();
        return response()->json([
            'msg' => 'saved',
            'newDish' => $dish
        ]);
    }
}
