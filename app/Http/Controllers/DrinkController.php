<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ApiFormatter;
use Exception;

class DrinkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /***API RESOURCE ***/

    public function apiIndex()
    {
        $data = Drink::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', 'handikadevs', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
        }
    }

    public function apiStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'category' => 'required',
                'thumbnail' => 'required',
                'ingredient' => 'required',
                'step' => 'required'
            ]);

            if ($request->thumbnail->isValid()) {
                $thumbnail = 'thumbnail-' . $request->get('name') . '.' . $request->thumbnail->extension();
                $request->file('thumbnail')->storeAs('drink/thumbnail', $thumbnail, 'public');
            }

            DB::beginTransaction();
            $drink = Drink::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'category' => $request->get('category'),
                'ingredient' => $request->get('ingredient'),
                'step' => $request->get('step'),
                'thumbnail' => $thumbnail,
            ]);
            $drink->save();

            DB::commit();

            $data = Drink::where('id', '=', $drink->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'success', 'handikadevs', $data);
            } else {
                return ApiFormatter::createApi(400, 'Falid', 'handikadevs');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Falid', 'handikadevs');
        }
    }

    public function apiSHow($id)
    {
        $data = Drink::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', 'handikadevs', $data);
        } else {
            return ApiFormatter::createApi(400, 'Falid', 'handikadevs');
        }
    }

    public function apiUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'category' => 'required',
                'description' => 'required',
                'ingredient' => 'required',
                'step' => 'required'
            ]);

            $drink = Drink::findOrFail($id);

            $drink->update([
                'name' => $request->name,
                'category' => $request->category,
                'description' => $request->description,
                'ingredient' => $request->ingredient,
                'step' => $request->step,

            ]);

            $data = Drink::where('id', '=', $drink->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', 'handikadevs', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
        }
    }

    public function apiDestroy($id)
    {
        $drink = Drink::findOrfail($id);

        $data = $drink->delete();

        if ($data) {
            return ApiFormatter::createApi(200, 'Suscess Destroy Data', 'handikadevs');
        } else {
            return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
        }
    }

    /** Customization function for grouping drink category */

    /** Juice List */
    public function juice()
    {
        $data = Drink::where('category', 'juice')->get();

        return view('pages.drink.drinkList')->with('data', $data);
    }

    /** Coffe List */
    public function coffee_and_tea()
    {
        $data = Drink::where('category', 'coffee and tea')->get();

        return view('pages.drink.drinkList')->with('data', $data);
    }

    /** Milk List */
    public function milk()
    {
        $data = Drink::where('category', 'milk')->get();

        return view('pages.drink.drinkList')->with('data', $data);
    }

    /** Squash List */
    public function squash()
    {
        $data = Drink::where('category', 'squash')->get();

        return view('pages.drink.drinkList')->with('data', $data);
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
            $request->file('thumbnail')->storeAs('drink/thumbnail', $thumbnail, 'public');
        }

        DB::beginTransaction();
        $drink = new Drink([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
            'ingredient' => $request->get('ingredient'),
            'step' => $request->get('step'),
            'thumbnail' => $thumbnail,
        ]);
        $drink->save();

        DB::commit();

        alert()->success('Saved', 'drink recipe created successfully');
        return redirect()->route('drink.juice');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        return view('pages.drink.drinkDetail', [
            'drink' => $drink
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink, Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            return view('pages.drink.drinkEdit', [
                'drink' => $drink
            ]);
        } else {
            return view('pages.error.403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drink $drink)
    {
        $drink->id = $request->drink->id;
        $drink->name = $request->get('name');
        $drink->thumbnail = $request->drink->thumbnail;
        $drink->category = $request->get('category');
        $drink->description = $request->get('description');
        $drink->ingredient = $request->get('ingredient');
        $drink->step = $request->get('step');
        $drink->created_at = $request->drink->created_at;
        $drink->updated_at = now();

        $drink->save();

        alert()->success('Edited', 'Recipe updated successfully');
        return redirect()->route('drink.juice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            $drink = Drink::find($id);
            $drink->delete();

            alert()->success('Deleted', 'Recipe deleted successfully');
            return redirect()->route('drink.juice');
        } else {
            return view('pages.error.403');
        }
    }
}
