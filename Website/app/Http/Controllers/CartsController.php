<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index($uid)
    {
        $users = User::find($uid);
        $carts = DB::table('products')->select('products.*', 'wishlists.user_id as uid', 'wishlists.prod_id as pid', 'wishlists.qty as cqty')
                ->leftJoin('wishlists' , 'wishlists.prod_id' ,'=', 'products.id')
                ->where('wishlists.user_id', '=', $uid)
                ->get();
        return view('carts.index', compact('users', 'carts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request, $pid, $uid)
    {
        // dd($request->qty);
        $validate = $request->validate([
            'qty' => 'nullable',
        ]); 
        
        $users = User::find($uid);
        // dd($uid);
        
        if($latestrecord = Carts::create($validate)){
            $latestrecord->prod_id = $pid;
            $latestrecord->user_id = $uid;
            $latestrecord->save();

            $products = Products::find($pid);
            $products->qty = $products->qty - $latestrecord->qty;
            if ($products->save()) {
                $carts = DB::table('products')->select('products.*', 'wishlists.user_id as uid', 'wishlists.prod_id as pid', 'wishlists.qty as cqty')
                ->leftJoin('wishlists' , 'wishlists.prod_id' ,'=', 'products.id')
                ->where('wishlists.user_id', '=', $uid)
                ->get();
            }
            // return view ('carts.index',compact('users','carts'));
            return redirect(route('carts.index', ['uid' => $uid] ));

        }   
        return redirect(route('users.index',compact('users')));
    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carts  $carts
    //  * @return \Illuminate\Http\Response
     */
    public function show(Carts $carts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carts  $carts
    //  * @return \Illuminate\Http\Response
     */
    public function edit(Carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carts  $carts
    //  * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carts $carts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carts  $carts
    //  * @return \Illuminate\Http\Response
     */
    public function destroy(Carts $carts)
    {
        //
    }
}
