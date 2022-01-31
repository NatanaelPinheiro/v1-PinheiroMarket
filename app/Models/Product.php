<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'image', 
        'brand', 
        'price', 
        'qty',
        'food_category',
        'installment',
        'discount',
        'description',
    ];
    
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
