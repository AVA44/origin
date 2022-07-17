<div class="header">
    <div class="header-logo flex-content">
        @if(Request::is('inventory'))
        <h3>Inventory Controll System</h3>
        @elseif(Request::is('inventory/create'))
        <h3>Inventory Create</h3>
        <div class="cancel">
            <a href="/inventory">キャンセル</a>
        </div>
        @elseif(Request::is('inventory/{inventory}/edit'))
        <h3>Inventory Edit</h3>
        <div class="cancel">
            <a href="/inventory">キャンセル</a>
        </div>
        @endif
    </div>
    
    <hr>
</div>