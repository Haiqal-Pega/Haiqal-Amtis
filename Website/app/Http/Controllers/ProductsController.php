<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('products')->select('*')->get();
        return view(route('products.admin'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $products = DB::table('products')->select('*')->get();
        // $products->paginate(5);
        return view('products.admin',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = DB::table('users')->select('*')->where('id', '=', $id)->get();
        return view('products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'details' => 'required',
            'img' => 'required',
            'qty' => 'required',
        ]);
        
        if(Products::create($validate)){
            return redirect(route('products.admin'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products, $id)
    {
        $products = Products::find($id);
        return view('products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'details' => 'required',
            'img' => 'nullable',
            'qty' => 'required',
        ]);

        $products = Products::find($id);
        $products->name = $request->name;
        $products->price = $request->price;
        $products->qty = $request->qty;
        $products->details = $request->details;
        if($request->img)
            $products->img = $request->img;

        if ($products->save()) {
            return redirect(route('products.admin'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products, $id)
    {
        Products::where('id',$id)->delete();
        return redirect('products.admin');
    }
}
