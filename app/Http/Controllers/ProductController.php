<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Category;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        
        $sorted = "";
        $search = "";
        $category_search = "";
        
        //検索機能
        if($request->search != null || $request->category_search != null) {
            // if($request->search == null) {
                $category_search = rtrim($request->category_search);
            // } else {
            //     $search = rtrim($request->search);
            //     if(is_int($request->search)) {
            //         $search = (string)$search;
            //     }
            // }
            
            //ソートあり
            if($request->sort != null) {
                $slice = explode(" ", $request->sort);
                $sort_query[$slice[0]] = $slice[1];
                $sorted = $request->sort;
                
                $inventories = Inventory::where('category', 'like', "%{$category_search}%")
                            // ->orwhere('category', 'like', "%{$category_search}%")
                            ->sortable($sort_query)->paginate(5);
            //ソートなし
            } else {
                $inventories = Inventory::where('category', 'like', "%{$category_search}%")
                            // ->orwhere('category', 'like', "%{$category_search}%")
                            ->paginate(5);
            }
            
        } elseif($request->search == null && $request->category_search == null) {
            //ソートあり
            if($request->sort != null) {
                $slice = explode(" ", $request->sort);
                $sort_query[$slice[0]] = $slice[1];
                $sorted = $request->sort;
                $inventories = Inventory::sortable($sort_query)->paginate(5);
                $search = "";
            //ソートなし
            } else {
                $inventories = Inventory::paginate(5);
                $search = "";
            }
        }
        
        $sort_values = [
            'expired_at asc' => '期限が早い順',
            'expired_at desc' => '期限が遅い順',
            'stock asc' => '在庫が少ない順',
            'stock desc' => '在庫が多い順',
            'unit_price asc' => '単価が安い順',
            'unit_price desc' => '単価が高い順'
            ];
        
        return view('products.index', compact('inventories', 'search', 'sort_values', 'sorted', 'request', 'categories', 'category_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $inventory = new Inventory();
        $categories = Category::all();
        
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file = $request->file('image_url');
        
        // バケットの`image`フォルダへアップロードする
        // $path = Storage::disk('s3')->putFile('image', $file, 'public');
        // // アップロードした画像のフルパスを取得
        // $inventory->image_url = Storage::disk('s3')->url($path);
        // $image = $file->store('public/products');
        // $inventory->image_url = basename($image);
        
        
        $request->validate([
        'name' => 'required|max:40',
        'expired_at' => 'required',
        'category' => 'required',
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
        
        if ($request->file('image_url') !== null) {
            $inventory->image_url = Storage::disk('s3')->putFile('public/products', $request->file('image_url'), 'public');
        } else {
            $inventory->image_url = '';
        }
        
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
        if ($request->file('image_url') !== null) {
            $inventory->image_url = Storage::disk('s3')->putFile('public/products', $request->file('image_url'), 'public');
        } else {
            $inventory->image_url = '';
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
