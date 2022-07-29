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

<form method="post" action="/inventory" enctype="multipart/form-data">
    @csrf
    <div class="form-contents">
        <label for="form-content1">商品名</label>
        <input id="form-content1" type="text" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-contents">
        <label for="form-content2">賞味期限</label>
        <input id="form-content2" type="date" name="expired_at" value="{{ old('expired_at') }}">
    </div>
    <div class="form-contents">
        <label for="form-content3">ジャンル</label>
        <select id="form-content3" name="category">
            <option value="">カテゴリを選択(デフォルトは'バラ')</option>
            <option value="ミドルボックス" @if("ミドルボックス" === old('category')) selected @endif>ミドルボックス</option>
            <option value="ゆらゆらボックス" @if("ゆらゆらボックス" === old('category')) selected @endif>ゆらゆらボックス</option>
            <option value="コンテナボックス" @if("コンテナボックス" === old('category')) selected @endif>コンテナボックス</option>
            <option value="六角ボックス" @if("六角ボックス" === old('category')) selected @endif>六角ボックス</option>
        </select>
    </div>
    <div class="form-contents">
        <label for="form-content4">在庫</label>
        <input id="form-content4" type="text" name="stock" value="{{ old('stock') }}">
    </div>
    <div class="form-contents">
        <label for="form-content5">納入時個数</label>
        <input id="form-content5" type="text" name="purchase" value="{{ old('purchase') }}">
    </div>
    <div class="form-contents">
        <label for="form-content6">単価</label>
        <input id="form-content6" type="text" name="unit_price" value="{{ old('unit_price') }}">
    </div>
    <div class="form-contents">
        <label for="form-content7">画像</label>
        <input id="form-content7" type="file" name="image_url">
    </div>
    <div class="form-contents">
        <input type="submit" value="商品作成">
    </div>
</form>

@endsection