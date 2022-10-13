<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inventory;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use Sortable;
    
    public $sortable = [
        'category'
     ];
    
    public function Inventory() {
        return $this->hasMany(Inventories::class);
    }
}
