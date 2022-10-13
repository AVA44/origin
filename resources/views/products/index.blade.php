@extends('layout.app')


@section('content')

@include('component.header', ['header_title' => 'index'])

<div class="overlay"></div>

<div class="category_add_delete show">
    <form class="add_category category_edit" method="post" action="{{ url('category') }}" {{-- style="display:none;"--}}>
        @csrf
        <input class="category_select" type="text" name="category_name" placeholder="ジャンル名">
        <br>
         <div class="change_button">
            <p class="add_red chan_btn">追加</p>
            <p class="des chan_btn">削除</p>
        </div>
        <input class="category_submit" type="submit" value="追加">
        <button class="category_cancel" type="button" onclick="cancel()">キャンセル</button>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    </form>
    <form class="des_category category_edit show" method="post" action="{{ url('category') }}" {{-- style="display:none;"--}}>
        @csrf
        <input type="hidden" name="_method" value="delete">
        <select class="category_select" name="category_name">
            <option value="">ジャンル名選択</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        <br>
        <div class="change_button">
            <p class="add chan_btn">追加</p>
            <p class="des_red chan_btn">削除</p>
        </div>
        <input class="category_submit" type="submit" value="削除">
        <button class="category_cancel" type="button" onclick="cancel()">キャンセル</button>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>

<form class="search_sort" action="/inventory">
    @csrf
    {{-- <label for="search">検索：</label>
    <input class="search" type="text" name="search" placeholder="商品名" value={{ $search }}> --}}
    
    <label for="category_search">ジャンル検索：</label>
    <select class="category_search" name="category_search">
        <option value="">未選択</option>
        @foreach($categories as $category)
                <option value="{{ $category->category }}">{{ $category->category }}</option>
        @endforeach
    </select>
    
    <lable for="sort">並び替え：</lable>
    <select class="sort" name="sort">
        <option value="">未選択</option>
        @foreach($sort_values as $sort_key => $sort_value)
            <option value="{{ $sort_key }}">{{ $sort_value }}</option>
        @endforeach
    </select>
    
    <input class="search_sort_button" type="submit" value ="表示">
</form>

<div class="edit">
    <p>ジャンルの追加・削除</p>
</div>

<div class="create">
    <a href="inventory/create">商品を追加する</a>
</div>

 {{-- @if($search)
<h3>”{{ $search }}” の検索結果</h3>
@endif --}}
@if($sorted)
<h3>”{{ $sort_values[$sorted] }}”</h3>
@endif
@if($category_search)
<h3>”{{ $category_search }}”の検索結果</h3>
@endif
<table border='1'>
    <tr>
        <th>商品名</th>
        <th>賞味期限</th>
        <th>ジャンル</th>
        <th>在庫</th>
        <th>入荷時個数</th>
        <th>単価</th>
        <th>登録日</th>
        <th>最終編集日</th>
        <th>編集・削除</th>
    </tr>
    @foreach($inventories as $inventory)
        <tr>
            @if($inventory->image_url != "")
                <td class="inventoryName">
                    {{-- <a href="{{ Storage::disk('s3')->url($inventory->image_url) }}">{{ $inventory->name }}</a> --}}
                    {{ $inventory->name }}
                </td>
            @else
                <td>{{ $inventory->name }}</td>
            @endif
            <td>{{ $inventory->expired_at }}</td>
            <td>{{ $inventory->category }}</td>
            <td>{{ $inventory->stock }}個</td>
            <td>{{ $inventory->purchase }}個/箱</td>
            <td>{{ $inventory->unit_price }}</td>
            <td class="not">{{ $inventory->created_at }}</td>
            <td class="not">{{ $inventory->updated_at }}</td>
            <td><a href="inventory/{{ $inventory->id }}/edit">編集</a></td>
        </tr>
        <div class="inventoryImageArea show">
            <div class="cancel"></div>
            <img  class="inventoryImage" src="{{ Storage::disk('s3')->url($inventory->image_url) }}" alt="商品画像">
        </div>
    @endforeach
    {{--
        <div class="inventoryImageArea">
            <img  class="inventoryImage" src="{{ Storage::disk('s3')->url($inventory->image_url) }}" alt="商品画像">
        </div>
    --}}
</table>
<div class="pagenate-button">{{ $inventories->appends(['sort' => $sorted, 'search' => $search])->links() }}</div>
@endsection