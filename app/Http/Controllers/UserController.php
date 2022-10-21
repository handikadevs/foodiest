<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $data = User::get();
        return view('pages.user.userList')->with('data', $data);
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
            // alihkan kembali ke tabel user list
            return redirect()->route('users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.user.userDetail', [
            'user' => $user
        ]);
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
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        alert()->success('Deleted', 'User deleted successfully');
        return redirect()->route('users.index');
    }
}
