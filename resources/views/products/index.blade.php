@extends('layout.app')

@section('content')
<form class="search">
    @csrf
    <input type="text" name="search">
    <input type="submit" value ="検索" for="search">
</form>

<div class="create">
    <a href="inventory/create">商品を追加する</a>
</div>

<table border='1'>
    <tr>
        <th>id</th>
        <th>商品名</th>
        <th>賞味期限</th>
        <th>ジャンル</th>
        <th>在庫</th>
        <th>入荷時個数</th>
        <th>単価</th>
        <th>画像url</th>
        <th>編集・削除</th>
        <th>登録日</th>
        <th>最終編集日</th>
    </tr>
    @foreach($inventories as $inventory)
        @if($inventory->delete_flag == 0)
            <tr>
                <td>{{ $inventory->id }}</td>
                <td>{{ $inventory->name }}</td>
                <td>{{ $inventory->date }}</td>
                <td>{{ $inventory->category }}</td>
                <td>{{ $inventory->stock }}</td>
                <td>{{ $inventory->purchase }}</td>
                <td>{{ $inventory->unit_price }}</td>
                <td>{{ $inventory->image_url }}</td>
                <td><a href="inventory/{{ $inventory->id}}/edit">編集</a></td>
                <td>{{ $inventory->created_at }}</td>
                <td>{{ $inventory->updated_at }}</td>
            </tr>
        @endif
    @endforeach
    
</table>
@endsection