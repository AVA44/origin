@extends('layout.app')

@section('content')
@endsection
    @csrf
    <div class="form-contents">
        <label for="form-content1">商品名</label>
        <input id="form-content1" type="text" name="商品名">
    </div>
    <div class="form-contents">
        <label for="form-content1">賞味期限</label>
        <input id="form-content1" type="text" name="賞味期限">
    </div>
    <div class="form-contents">
        <label for="form-content1">ジャンル</label>
        <input id="form-content1" type="text" name="ジャンル">
    </div>
    <div class="form-contents">
        <label for="form-content1">在庫</label>
        <input id="form-content1" type="text" name="在庫">
    </div>
    <div class="form-contents">
        <label for="form-content1">納入時個数</label>
        <input id="form-content1" type="text" name="納入時個数">
    </div>
    <div class="form-contents">
        <label for="form-content1">単価</label>
        <input id="form-content1" type="text" name="単価">
    </div>
    <div class="form-contents">
        <label for="form-content1">画像</label>
        <input id="form-content1" type="text" name="画像">
    </div>
</form>
@endsection