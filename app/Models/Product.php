<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_products')->withPivot('quantity');
    }

    public function ligneCommande(){
        return $this->hasMany(LigneCommande::class);
    }
    
    public function latestLigneCommande()
    {
        return $this->hasOne(LigneCommande::class)->latestOfMany(); // uses created_at or id
    }

        
    
    

}
