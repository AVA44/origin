<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Inventory extends Model
{
    // protected $fillable = ['name', 'date', 'category', 'stock', 'purchase', 'unit_price', 'image_url', 'delete_flag'];
    public function Categories() {
        return $this->belongsTo(Categories::class);
    }
}
