<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesModel extends Model
{
    use HasFactory;

    protected $table = "sales";

    public function products(){
        return $this->belongsTo(ProductsModel::class, 'item_id', 'id');
    }
}
