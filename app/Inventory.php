<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Kyslik\ColumnSortable\Sortable;

class Inventory extends Model
{
    use Sortable;
    
    public $sortable = [
         'expired_at', 
         'stock',
         'unit_price'
     ];
     
    // protected $fillable = ['name', 'date', 'category', 'stock', 'purchase', 'unit_price', 'image_url', 'delete_flag'];
    public function Categories() {
        return $this->belongsTo(Categories::class);
    }
    
    
}
