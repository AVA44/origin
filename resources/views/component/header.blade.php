<div class="header">
    <div class="header-logo flex-content">
        @if(Request::is('inventory'))
        <h3>Inventory Controll System</h3>
        <nav>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" value="ログアウト">
            </form>
        </nav>
        @elseif(Request::is('inventory/create'))
        <h3>Inventory Create</h3>
        <div class="cancel">
            <nav>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" value="ログアウト">
                </form>
                <a href="/inventory">キャンセル</a></a>
            </nav>
        </div>
        @elseif(Request::is('inventory/*/edit'))
        <h3>Inventory Edit</h3>
        <div class="cancel">
            <nav>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" value="ログアウト">
                </form>
                <a href="/inventory">一覧に戻る</a>
            </nav>
        </div>
        @elseif(Request::is('login'))
        <h3>Login</h3>
        <nav>
            <a href={{ route('register') }}>新規登録</a>
        </nav>
        @elseif(Request::is('register'))
        <h3>新規登録</h3>
        <nav><a href={{ route('login') }}>ログイン</a></nav>
        @endif
    </div>
    
    <hr>
</div>