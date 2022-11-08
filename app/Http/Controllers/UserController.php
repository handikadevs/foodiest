<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
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

    /*** API RESOURCE ***/

    /**
     * Create api users instance.
     *
     * @return void
     */
    public function apiIndex()
    {
        $data = User::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', 'handikadevs', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
        }
    }

    /**
     * Store a newly created api
     * 
     * 
     */
    public function apiStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('foodiest123')
            ]);

            $data = User::where('id', '=', $user->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', 'handikadevs', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apiShow($id)
    {
        $data = User::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', 'handikadevs', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
        }
    }

    /** 
     * API Update the specified resource in storage
     * 
     * 
     */
    public function apiUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);

            $user = User::findOrFail($id);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => Hash::make('foodiest123')
            ]);

            $data = User::where('id', '=', $user->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', 'handikadevs', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
        }
    }

    /**
     * Remove the specified API
     * 
     *  
     */
    public function apiDestroy($id)
    {
        $user = User::findOrFail($id);

        $data = $user->delete();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success Destroy Data', 'handikadevs');
        } else {
            return ApiFormatter::createApi(400, 'Failed', 'handikadevs');
        }
    }

    /*** LARAVEL VIEW RESOURCE ***/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            $data = User::get();
            return view('pages.user.userList')->with('data', $data);
        } else {
            return view('pages.error.403');
        }
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
        // valadasi kolom yang harus di isi, sebelum proses upload ke database
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // request user untuk mendapatkan data user role
        $user = $request->user();

        // jika user role admin
        if ($user->hasRole('admin')) {
            $newUser = new User([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'email_verified_at' => now(),
                'password' => Hash::make('foodiest123'), //password default (foodiest123) untuk user baru yang ditambahkan oleh admin, bukan register sendiri.
            ]);

            $newUser->save();

            DB::commit();

            alert()->success('Saved', 'User created successfully');
            return redirect()->route('users.index');
        }

        // jika user role bukan admin
        else {
            // alihkan kembali ke error 403
            return view('pages.error.403');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if ($user->hasRole('admin')) {
            return view('pages.user.userDetail', [
                'user' => $user
            ]);
        } else {
            return view('pages.error.403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->id = $request->user->id;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->user->password);
        $user->email_verified_at = $request->user->email_verified_at;
        $user->created_at = $request->user->created_at;
        $user->updated_at = now();

        $user->save();

        alert()->success('Edited', 'User updated successfully');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $userRole = $request->user();
        if ($userRole->hasRole('admin')) {

            $user = User::find($id);
            $user->delete();

            alert()->success('Deleted', 'User deleted successfully');
            return redirect()->route('users.index');
        } else {
            return view('pages.error.403');
        }
    }
}
