<div class="header">
    
    <div class="header-contents">
        <h3 class="header-title">Inventory Controll System　ー　{{ $header_title }}</h3>
        <nav class="header-nav">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" value="ログアウト">
            </form>
        </nav>
    </div>
    <hr>
    
</div>