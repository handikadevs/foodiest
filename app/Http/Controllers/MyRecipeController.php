<?php

namespace App\Http\Controllers;

use App\Models\MyRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Helpers\ApiFormatter;

class MyRecipeController extends Controller
{

    /***API RESOURCE ***/

    public function apiIndex()
    {
        $data = MyRecipe::all();

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
                $request->file('thumbnail')->storeAs('myRecipe/thumbnail', $thumbnail, 'public');
            }

            DB::beginTransaction();
            $myRecipe = MyRecipe::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'category' => $request->get('category'),
                'ingredient' => $request->get('ingredient'),
                'step' => $request->get('step'),
                'thumbnail' => $thumbnail,
            ]);
            $myRecipe->save();

            DB::commit();

            $data = MyRecipe::where('id', '=', $myRecipe->id)->get();

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
        $data = MyRecipe::where('id', '=', $id)->get();

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

            $myRecipe = MyRecipe::findOrFail($id);

            $myRecipe->update([
                'name' => $request->name,
                'category' => $request->category,
                'description' => $request->description,
                'ingredient' => $request->ingredient,
                'step' => $request->step,

            ]);

            $data = MyRecipe::where('id', '=', $myRecipe->id)->get();

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
        $myRecipe = MyRecipe::findOrfail($id);

        $data = $myRecipe->delete();

        if ($data) {
            return ApiFormatter::createApi(200, 'Suscess Destroy Data', 'handikadevs');
        } else {
            return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $data = MyRecipe::get();

    //     return view('pages.myRecipe.myRecipeList')->with('data', $data);
    // }

    public function food()
    {
        $data = MyRecipe::where('category', 'food')->get();

        return view('pages.myRecipe.myRecipeList')->with('data', $data);
    }

    public function drink()
    {
        $data = MyRecipe::where('category', 'drink')->get();

        return view('pages.myRecipe.myRecipeList')->with('data', $data);
    }

    public function cake()
    {
        $data = MyRecipe::where('category', 'cake')->get();

        return view('pages.myRecipe.myRecipeList')->with('data', $data);
    }

    public function other()
    {
        $data = MyRecipe::where('category', 'other')->get();

        return view('pages.myRecipe.myRecipeList')->with('data', $data);
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

        //if thumbnail is valif

        if ($request->thumbnail->isValid()) {
            $thumbnail = 'thumbnail-' . $request->get('name') . '.' . $request->thumbnail->extention();
            $request->file('thumbnail')->storAs('myrecipe/thumbnail', $thumbnail, 'public');
        }

        DB::beginTransaction();
        $myRecipe = new MyRecipe([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
            'ingredient' => $request->get('ingredient'),
            'step' => $request->get('step'),
            'thumbnail' => $thumbnail,
        ]);
        $myRecipe->save();

        DB::commit();

        alert()->success('Saved', ' MyRecipe created successfully');
        return redirect()->route('myRecipe.food');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyRecipe  $myRecipe
     * @return \Illuminate\Http\Response
     */
    public function show(MyRecipe $myRecipe)
    {
        return view('pages.myRecipe.myRecipeDetail', [
            'myRecipe' => $myRecipe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyRecipe  $myRecipe
     * @return \Illuminate\Http\Response
     */
    public function edit(MyRecipe $myRecipe, Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            return view('pages.myRecipe.myRecipeEdit', [
                'myRecipe' => $myRecipe
            ]);
        } else {
            return view('pages.error.403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyRecipe  $myRecipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyRecipe $myRecipe)
    {
        $myRecipe->id = $request->drink->id;
        $myRecipe->name = $request->get('name');
        $myRecipe->thumbnail = $request->drink->thumbnail;
        $myRecipe->category = $request->get('category');
        $myRecipe->description = $request->get('description');
        $myRecipe->ingredient = $request->get('ingredient');
        $myRecipe->step = $request->get('step');
        $myRecipe->created_at = $request->drink->created_at;
        $myRecipe->updated_at = now();

        $myRecipe->save();

        alert()->success('Edited', 'Recipe updated successfully');
        return redirect()->route('myRecipe.food');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyRecipe  $myRecipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, request $request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            $myRecipe = MyRecipe::find($id);
            $myRecipe->delete();

            alert()->success('Deleted', 'Recipe deleted successfully');
            return redirect()->route('drink.juice');
        } else {
            return view('pages.error.403');
        }
    }
}
