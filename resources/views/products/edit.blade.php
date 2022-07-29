@extends('layout.app')

@section('content')

@if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif

<form method="POST" action="{{ url('/inventory', $inventory->id) }}">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-contents">
        <label for="form-content1">商品名</label>
        <input id="form-content1" type="text" name="name" placeholder="{{ old('name') == '' ? $inventory->name : old('name') }}">
    </div>
    <div class="form-contents">
        <label for="form-content2">賞味期限</label>
        <input id="form-content2" type="date" name="expired_at" placeholder="{{ old('expired_at') == '' ? $inventory->date : old('expired_at') }}">
    </div>
    <div class="form-contents">
        <label for="form-content3">ジャンル</label>
        <select id="form-content3" name="category">
            <option>{{ $inventory->category }}</option>
            <option value="ミドルボックス" @if("ミドルボックス" === $inventory->category) selected @endif>ミドルボックス</option>
            <option value="ゆらゆらボックス" @if("ゆらゆらボックス" === $inventory->category) selected @endif>ゆらゆらボックス</option>
            <option value="コンテナボックス" @if("コンテナボックス" === $inventory->category) selected @endif>コンテナボックス</option>
            <option value="六角ボックス" @if("六角ボックス" === $inventory->category) selected @endif>六角ボックス</option>
        </select>
    </div>
    <div class="form-contents">
        <label for="form-content4">在庫</label>
        <input id="form-content4" type="text" name="stock" placeholder="{{ old('stock') == '' ? $inventory->stock : old('stock') }}">
    </div>
    <div class="form-contents">
        <label for="form-content5">納入時個数</label>
        <input id="form-content5" type="text" name="purchase" placeholder="{{ old('purchase') == '' ? $inventory->purchase : old('purchase') }}">
    </div>
    <div class="form-contents">
        <label for="form-content6">単価</label>
        <input id="form-content6" type="text" name="unit_price" placeholder="{{ old('unit_price') == '' ? $inventory->unit_price : old('unit_price') }}">
    </div>
    <div class="form-contents">
        <label for="form-content7">画像</label>
        <input id="form-content7" type="files" name="image_url" {{--value="@if(Session::get('file_data')) Session::get('file_data') @endif"--}}>
        <img src="{{ $user->image }}">
    </div>
    <div class="form-contents">
        <input type="submit" value="編集">
    </div>
</form>
<form class="destroy" method="post" action="{{ url('/inventory', $inventory->id) }}">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="景品削除">
</form>

@endsection