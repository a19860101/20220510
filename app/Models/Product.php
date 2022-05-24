<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['category_id','title','desc','price','sale','started_at','ended_at','cover'];

    public function category(){
        return $this->belongsTo(Category::class);
        // return $this->belongsTo('App\Category'); //laravel 7
    }
}
