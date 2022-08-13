@extends('layout.app')


@section('content')

@include('component.header', ['header_title' => 'index'])

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
<h3>”{{ $sorted }}”</h3>
@endif
<table border='1'>
    <tr>
        <th>商品名</th>
        <th>賞味期限</th>
        <th>ジャンル</th>
        <th>在庫</th>
        <th>入荷時個数</th>
        <th>単価</th>
        <th>画像url</th>
        <th>登録日</th>
        <th>最終編集日</th>
        <th>編集・削除</th>
    </tr>
    @foreach($inventories as $inventory)
        @if($inventory->delete_flag == 0)
            <tr>
                <td>{{ $inventory->name }}</td>
                <td>{{ $inventory->expired_at }}</td>
                <td>{{ $inventory->category }}</td>
                <td>{{ $inventory->stock }}</td>
                <td>{{ $inventory->purchase }}</td>
                <td>{{ $inventory->unit_price }}</td>
                <td>{{ $inventory->image_url }}</td>
                <td>{{ $inventory->created_at }}</td>
                <td>{{ $inventory->updated_at }}</td>
                <td><a href="inventory/{{ $inventory->id }}/edit">編集</a></td>
            </tr>
        @endif
    @endforeach
    
</table>
@endsection