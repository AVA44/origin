<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inventory;

class Category extends Model
{
    public function Inventory() {
        return $this->hasMany(Inventories::class);
    }
}
