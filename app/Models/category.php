<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public  $table='category';

    public function product(){
        return $this->hasMany(product::class,'category_id','id');
    }
}
