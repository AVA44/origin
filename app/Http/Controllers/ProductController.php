<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;

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
        // $file = $request->input('image_url');
        
        // // バケットの`image`フォルダへアップロードする
        // $path = Storage::disk('s3')->putFile('image', $file, 'public');
        // // アップロードした画像のフルパスを取得
        // $inventory->image_url = Storage::disk('s3')->url($path);
        
        
        
        $request->validate([
        'name' => 'required|max:40',
        'expired_at' => 'required',
        'stock' => 'required',
        'purchase' => 'required',
        'unit_price' => 'required',
        ]);
        
        $inventory = new Inventory();
        
        if($request->input('name')) {
            $inventory->name = $request->input('name');
        }
        if($request->input('expired_at')) {
            $inventory->expired_at = $request->input('expired_at');
        }
        if($request->input('category')) {
            $inventory->category = $request->input('category');
        }
        if($request->input('stock')) {
            $inventory->stock = $request->input('stock');
        }
        if($request->input('purchase')) {
            $inventory->purchase = $request->input('purchase');
        }
        if($request->input('unit_price')) {
            $inventory->unit_price = $request->input('unit_price');
        }
        if($request->input('image_url')) {
            $inventory->image_url = $request->input('image_url');
        }
        
        // $inventory->create([
        //     'name' => $request->input('name'),
        //     'date' => $request->input('date'),
        //     'category' => $request->input('date'),
        //     'stock' => $request->input('date'),
        //     'purchase' => $request->input('date'),
        //     'unit_price' => $request->input('date'),
        //     'image_url' => $request->input('date'),
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
        // $file = $request->image_url;
        // $fileData = file_get_contents($file->getRealPath());
        // $fileName = $file->getClientOriginalName();
        // Session::put('file_date', $fileData);
        // Session::put('file_name', $fileName); 
        
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
        $request->validate([
        'name' => 'required|max:40',
        'expired_at' => 'required',
        'stock' => 'required',
        'purchase' => 'required',
        'unit_price' => 'required',
        ]);
        
        if($request->input('name')) {
            $inventory->name = $request->input('name');
        }
        if($request->input('expired_at')) {
            $inventory->expired_at = $request->input('expired_at');
        }
        if($request->input('category')) {
            $inventory->category = $request->input('category');
        }
        if($request->input('stock')) {
            $inventory->stock = $request->input('stock');
        }
        if($request->input('purchase')) {
            $inventory->purchase = $request->input('purchase');
        }
        if($request->input('unit_price')) {
            $inventory->unit_price = $request->input('unit_price');
        }
        if($request->input('image_url')) {
            $inventory->image_url = $request->input('image_url');
        }
        
        $inventory->update();
        
        return redirect()->route('inventory.index');
        
        //requestに値が入っているものだけ更新 if文
        //必須なものはバリデーション
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $inventory = Inventory::where('id', $id)->first();
        $inventory->delete_flag = 1;
        
        $inventory->save();
        
        return redirect()->route('inventory.index');
    }
}
