<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $legit = 0;
        $email = $request->email;
        $password = $request->password;
        $users = DB::table('users')->select('*')->get();
        foreach ($users as $user => $key) {
            if ($email == $key->email) {
                if ($password == $key->password)
                    $legit = 1;

                if ($legit == 1) {
                    if ($key->role == 'R001') {
                        $id = $key->id;
                        $users = DB::table('users')->select('*')->where('id', '=', $id)->get();
                        $products = DB::table('products')->select('*')->get();
                        return view('users.index', compact('users','products'));
                    } elseif ($key->role == 'R000') {
                        $id = $key->id; 
                        $user = DB::table('users')->select('*')->where('id', '=', $id)->get();
                        return view('users.admin', compact('user'));
                    } else
                        return redirect(route('login'));
                }
            }
        }
        return redirect(route('login'));
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        // $user = DB::table('users')->select('*')->where('id', '=', $id)->get();
        return view('users.admin');
    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'firstName' => 'required',
            'lastName' => 'nullable',
            'email' => 'required',
            'password' => 'required',
            'address' => 'nullable',
            'dob' => 'nullable'
        ]);

        if($users = Users::create($validate)) {
            $users->role = 'R001';
        }
        $users->save();
        return redirect(route('login'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
    //  * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
    //  * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
    //  * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
    //  * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}