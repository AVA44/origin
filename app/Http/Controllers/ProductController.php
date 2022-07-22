<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::all();
        
        return view('products.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventory = new Inventory();
        
        return view('products.create', compact('inventory'));
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
        'name' => 'required|max:40',
        'date' => 'required',
        'category' => 'required|max:16',
        'stock' => 'required',
        'purchase' => 'required',
        'unit_price' => 'required',
        'image_url' => 'required',
        ]);
        
        $inventory = new Inventory();
        
        $inventory->name = $request->input('name');
        $inventory->date = $request->input('date');
        $inventory->category= $request->input('category');
        $inventory->stock = $request->input('stock');
        $inventory->purchase = $request->input('purchase');
        $inventory->unit_price = $request->input('unit_price');
        $inventory->image_url = $request->input('image_url');
        
        // $inventory->create([
        //     'name' => $request->input('name'),
        //     'date' => $request->input('date'),
        //     'category' => $request->input('date'),
        //     'stock' => $request->input('date'),
        //     'purchase' => $request->input('date'),
        //     'unit_price' => $request->input('date'),
        //     'image_url' => $request->input('date'),
        //     'delete_flag' => 0
        //     ]);
        
        $inventory->save();
        
        return redirect()->route('inventory.index');
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
    public function edit(Inventory $inventory)
    {
        return view('products.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        // $file = $request->image_url;
        // $fileData = file_get_contents($file->getRealPath());
        // $fileName = $file->getClientOriginalName();
        // Session::put('file_date', $fileData);
        // Session::put('file_name', $fileName);
        
        $inventory->name = $request->input('name');
        $inventory->date = $request->input('date');
        $inventory->category= $request->input('category');
        $inventory->stock = $request->input('stock');
        $inventory->purchase = $request->input('purchase');
        $inventory->unit_price = $request->input('unit_price');
        $inventory->image_url = $request->input('image_url');
        $inventory->delete_flag = 0;
        
        $inventory->update();
        
        return redirect()->route('inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $inventory = new Inventory();
        $inventory->delete_flag = $request->input('delete_flag');
        
        $inventory->update();
    }
}
