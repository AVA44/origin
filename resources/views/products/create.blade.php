@extends('layout.app')


@section('content')

@include('component.header', ['header_title' => 'create'])

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<div class="create_container container">
    <form method="post" action="/inventory" enctype="multipart/form-data">
        @csrf
        <div class="form-contents">
            <label for="name">商品名：</label>
            <input id="name" class="form-content" type="text" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-contents">
            <label for="expired_at">賞味期限：</label>
            <input id="expired_at" class="form-content" type="date" name="expired_at" value="{{ old('expired_at') }}">
        </div>
        <div class="form-contents">
            <label for="category">ジャンル：</label>
            <select id="category" class="form-content" name="category">
                <option value="">カテゴリを選択</option>
                @foreach($categories as $category)
                <option name=category @if(old('category') == $category->category) selected  @endif> {{ $category->category }} </option>
                @endforeach
            </select>
        </div>
        <div class="form-contents">
            <label for="stock">在庫：</label>
            <input id="stock" class="form-content" type="text" name="stock" value="{{ old('stock') }}">
        </div>
        <div class="form-contents">
            <label for="purchase">納入時個数：</label>
            <input id="purchase" class="form-content" type="text" name="purchase" value="{{ old('purchase') }}">
        </div>
        <div class="form-contents">
            <label for="unit_price">単価：</label>
            <input id="unit_price" class="form-content" type="text" name="unit_price" value="{{ old('unit_price') }}">
        </div>
        <div class="form-contents not">
            <label for="product-image">画像：</label>
            <input id="product-image" class="form-content" type="file" name="image_url" onChange="handleImage(this.files)" style="display: none;">
                  <img class="image-preview" src="#" id="product-image-preview">
        </div>
        <div class="buttons">
            <div class="create-button button">
                <input type="submit" value="商品作成">
            </div>
            <div class="cancel-button button">
                <a href="/inventory">キャンセル</a>
            </div>
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