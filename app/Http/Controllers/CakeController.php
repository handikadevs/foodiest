<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CakeController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        if($request->thumbnail->isValid())
        {
            $thumbnail = 'thumbnail-'.$request->get('name').'.'.$request->thumbnail->extension();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Http\Response
     */
    public function edit(Cake $cake)
    {
        return view('pages.cake.cakeDetail', [
            'cake' => $cake
        ]);
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
    public function destroy($id)
    {
        $cakes = Cake::find($id);
        $cakes->delete();

        alert()->success('Deleted', 'Recipe deleted successfully');
        return redirect()->route('cakes.index');
    }
}
