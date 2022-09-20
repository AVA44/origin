@extends('layout.app')


@section('content')

@include('component.header', ['header_title' => 'index'])

<div class="overlay"></div>
<form action="/inventory" class="search_sort">
    @csrf
    <label for="search">検索：</label>
    <input class="search" type="text" name="search" value={{ $search }}>
    
    <lable for="sort">並び替え：</lable>
    <select class="sort" name="sort">
        <option value=""></option>
        @foreach($sort_values as $sort_key => $sort_value)
            @if($sorted == $sort_key)
            <option value="{{ $sort_key }}" selected>{{ $sort_value }}</option>
            @else
            <option value="{{ $sort_key }}">{{ $sort_value }}</option>
            @endif
        @endforeach
    </select>
    
    <input class="search_sort_button" type="submit" value ="表示">
</form>

<div class="create">
    <a href="inventory/create">商品を追加する</a>
</div>

@if($search)
<h3>”{{ $search }}” の検索結果</h3>
@endif
@if($sorted)
<h3>”{{ $sort_values[$sorted] }}”</h3>
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
        @if($inventory->delete_flag == 0)
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
        @endif
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
<div class="pagenate-button">{{ $inventories->links() }}</div>
@endsection