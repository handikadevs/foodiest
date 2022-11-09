<?php

namespace App\Http\Controllers;

use App\Models\MyRecipe;
use Illuminate\Http\Request;

class MyRecipeController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyRecipe  $myRecipe
     * @return \Illuminate\Http\Response
     */
    public function show(MyRecipe $myRecipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyRecipe  $myRecipe
     * @return \Illuminate\Http\Response
     */
    public function edit(MyRecipe $myRecipe)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyRecipe  $myRecipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyRecipe $myRecipe)
    {
        //
    }
}
