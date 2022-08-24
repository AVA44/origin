@extends('layout.app')


@section('content')

@include('component.header', ['header_title' => 'edit'])

@if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif

<h4>※変更点のみ記入</h4>
<div class="edit_container container">
    <form method="POST" action="{{ url('/inventory', $inventory->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-contents">
            <label for="name">商品名：</label>
            <input id="name" class="form-content" type="text" name="name" placeholder="{{ old('name') == '' ? $inventory->name : old('name') }}">
        </div>
        <div class="form-contents">
            <label for="expired_at">賞味期限：</label>
            <input id="expired_at" class="form-content" type="date" name="expired_at" placeholder="{{ old('expired_at') == '' ? $inventory->date : old('expired_at') }}">
        </div>
        <div class="form-contents">
            <label for="category">ジャンル：</label>
            <select id="category" class="form-content" name="category">
                <option>{{ $inventory->category }}</option>
                <option value="ミドルボックス" @if("ミドルボックス" === $inventory->category) selected @endif>ミドルボックス</option>
                <option value="ゆらゆらボックス" @if("ゆらゆらボックス" === $inventory->category) selected @endif>ゆらゆらボックス</option>
                <option value="コンテナボックス" @if("コンテナボックス" === $inventory->category) selected @endif>コンテナボックス</option>
                <option value="六角ボックス" @if("六角ボックス" === $inventory->category) selected @endif>六角ボックス</option>
            </select>
        </div>
        <div class="form-contents">
            <label for="stock">在庫：</label>
            <input id="stock" class="form-content" type="text" name="stock" placeholder="{{ old('stock') == '' ? $inventory->stock : old('stock') }}">
        </div>
        <div class="form-contents">
            <label for="purchase">納入時個数：</label>
            <input id="purchase" class="form-content" type="text" name="purchase" placeholder="{{ old('purchase') == '' ? $inventory->purchase : old('purchase') }}">
        </div>
        <div class="form-contents">
            <label for="unit-price">単価：</label>
            <input id="unit-price" class="form-content" type="text" name="unit_price" placeholder="{{ old('unit_price') == '' ? $inventory->unit_price : old('unit_price') }}">
        </div>
        
        <div class="form-contents">
            <label for="image-url" class="image-url">画像</label><span>：</span>
            <div class="form-content edit-image">
                <input id="image-url" type="file" name="image_url" onChange="handleImage(this.files)" style="display: none;">
                @if($inventory->image_url != "")
                <img class="edit-preview" src="{{ Storage::disk('s3')->url($inventory->image_url) }}">
                @else
                <p class="edit-preview n-image">画像無し</p>
                @endif
                <p>
                    ↑↑変更前↑↑
                    <br>
                    ↓↓変更後↓↓
                </p>
                <img class="edit-preview" src="#" id="product-image-preview">
            </div>
        </div>
        
        <div class="edit-buttons">
            <div class="edit-button button">
                <input type="submit" value="編集">
            </div>
            
            <form class="destroy-button button" method="post" action="{{ url('/inventory', $inventory->id) }}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" value="景品削除">
                <div class="cancel-button button">
                    <a href="/inventory">キャンセル</a>
                </div>
            </form>
        </div>
    </form>
</div>

<script type="text/javascript">
     function handleImage(image) {
          let reader = new FileReader();
          reader.onload = function() {
              let imagePreview = document.getElementById("product-image-preview");
              imagePreview.src = reader.result;
          }
          console.log(image);
          reader.readAsDataURL(image[0]);
      }
 </script>

@endsection