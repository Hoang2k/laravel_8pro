<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public $table='products';
    public $timestamps = false;
    public function Category(){
        return $this->belongsTo(category::class,'category_id','id');
    }
}
