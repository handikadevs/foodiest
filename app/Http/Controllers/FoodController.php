<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Food;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Create api users instance.
     *
     * @return void
     */
    public function createFoodApi()
    {
        $data = Food::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', 'handikadevs', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /** Customization function for grouping food category */

    /** Asian Food List */
    public function asian()
    {
        $data = Food::where('category', 'asian')->get();

        return view('pages.food.foodList')->with('data', $data);
    }

    /** Chinese Food List */
    public function chinese()
    {
        $data = Food::where('category', 'chinese')->get();

        return view('pages.food.foodList')->with('data', $data);
    }

    /** Indonesian Food List */
    public function indonesian()
    {
        $data = Food::where('category', 'indonesian')->get();

        return view('pages.food.foodList')->with('data', $data);
    }

    /**Western Food List */
    public function western()
    {
        $data = Food::where('category', 'western')->get();

        return view('pages.food.foodList')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'thumbnail' => 'required',
            'ingredient' => 'required',
            'step' => 'required'
        ]);

        // Check Thumbnail is Valid
        if ($request->thumbnail->isValid()) {
            $thumbnail = 'thumbnail-' . $request->get('name') . '.' . $request->thumbnail->extension();
            $request->file('thumbnail')->storeAs('food/thumbnail', $thumbnail, 'public');
        }

        DB::beginTransaction();
        $food = new Food([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
            'ingredient' => $request->get('ingredient'),
            'step' => $request->get('step'),
            'thumbnail' => $thumbnail,
        ]);
        $food->save();

        DB::commit();

        alert()->success('Saved', 'Food recipe created successfully');
        return redirect()->route('food.asian');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view('pages.food.foodDetail', [
            'food' => $food
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food, Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            return view('pages.food.foodEdit', [
                'food' => $food
            ]);
        } else {
            return view('pages.error.403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $food->id = $request->food->id;
        $food->name = $request->get('name');
        $food->thumbnail = $request->food->thumbnail;
        $food->category = $request->get('category');
        $food->description = $request->get('description');
        $food->ingredient = $request->get('ingredient');
        $food->step = $request->get('step');
        $food->created_at = $request->food->created_at;
        $food->updated_at = now();

        $food->save();

        alert()->success('Edited', 'Recipe updated successfully');
        return redirect()->route('food.asian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            $food = Food::find($id);
            $food->delete();

            alert()->success('Deleted', 'Recipe deleted successfully');
            return redirect()->route('food.asian');
        } else {
            return view('pages.error.403');
        }
    }
}
