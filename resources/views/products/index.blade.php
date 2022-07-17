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
        <th>画像url</th>
        <th></th>
    </tr>
    <tr>
        <td>じ</td>
        <td>ょ</td>
        <td>う</td>
        <td>ほ</td>
        <td>う</td>
        <td>を</td>
        <td>る</td>
        <td><a href="inventory/{inventory}/edit">編集</a></td>
    </tr>
    <tr>
        <td>ー</td>
        <td>ぷ</td>
        <td>さ</td>
        <td>せ</td>
        <td>て</td>
        <td>そ</td>
        <td>う</td>
        <td><a href="inventory/{inventory}/edit">編集</a></td>
    </tr>
    <tr>
        <td>に</td>
        <td>ゅ</td>
        <td>う</td>
        <td>す</td>
        <td>る</td>
        <td>！</td>
        <td>！</td>
        <td><a href="inventory/{inventory}/edit">編集</a></td>
    </tr>
</table>
@endsection