<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Helpers\ApiFormatter;


class CakeController extends Controller
{
    /***API CAKE ***/

    public function apiIndex()
    {
        $data = Cake::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', 'handikadevs', $data);
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
                $request->file('thumbnail')->storeAs('cake/thumbnail', $thumbnail, 'public');
            }

            DB::beginTransaction();
            $cake = Cake::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'category' => $request->get('category'),
                'ingredient' => $request->get('ingredient'),
                'step' => $request->get('step'),
                'thumbnail' => $thumbnail,
            ]);
            $cake->save();

            DB::commit();

            $data = Cake::where('id', '=', $cake->id)->get();

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
        $data = Cake::where('id', '=', $id)->get();

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

            $cake = Cake::findOrFail($id);

            $cake->update([
                'name' => $request->name,
                'category' => $request->category,
                'description' => $request->description,
                'ingredient' => $request->ingredient,
                'step' => $request->step,

            ]);

            $data = Cake::where('id', '=', $cake->id)->get();

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
        $cake = Cake::findOrfail($id);

        $data = $cake->delete();

        if ($data) {
            return ApiFormatter::createApi(200, 'Suscess Destroy Data', 'handikadevs');
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cake::get();
        return view('pages.cake.cakeList')->with('data', $data);
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
            'thumbnail' => 'required',
            'ingredient' => 'required',
            'step' => 'required'
        ]);

        // Check Thumbnail is Valid
        if ($request->thumbnail->isValid()) {
            $thumbnail = 'thumbnail-' . $request->get('name') . '.' . $request->thumbnail->extension();
            $request->file('thumbnail')->storeAs('cake/thumbnail', $thumbnail, 'public');
        }

        DB::beginTransaction();
        $cake = new Cake([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'ingredient' => $request->get('ingredient'),
            'step' => $request->get('step'),
            'thumbnail' => $thumbnail,
        ]);
        $cake->save();

        DB::commit();

        alert()->success('Saved', 'Cake recipe created successfully');
        return redirect()->route('cakes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Http\Response
     */
    public function show(Cake $cake)
    {
        return view('pages.cake.cakeDetail', [
            'cake' => $cake
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Http\Response
     */
    public function edit(Cake $cake, Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {

            return view('pages.cake.cakeEdit', [
                'cake' => $cake
            ]);
        } else {
            return view('pages.error.403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cake $cake)
    {
        $cake->id = $request->cake->id;
        $cake->name = $request->get('name');
        $cake->thumbnail = $request->cake->thumbnail;
        $cake->description = $request->get('description');
        $cake->ingredient = $request->get('ingredient');
        $cake->step = $request->get('step');
        $cake->created_at = $request->cake->created_at;
        $cake->updated_at = now();

        $cake->save();

        alert()->success('Edited', 'Recipe updated successfully');
        return redirect()->route('cakes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            $cakes = Cake::find($id);
            $cakes->delete();

            alert()->success('Deleted', 'Recipe deleted successfully');
            return redirect()->route('cakes.index');
        } else {
            return view('pages.error.403');
        }
    }
}
