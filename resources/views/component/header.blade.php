<div class="header">
    <div class="header-logo flex-content">
        @if(Request::is('inventory'))
        <h3>Inventory Controll System</h3>
        @elseif(Request::is('inventory/create'))
        <h3>Inventory Create</h3>
        @else
        <h3>Inventory Edit</h3>
        @endif
    </div>
    
    <hr>
</div>