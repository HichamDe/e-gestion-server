<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $fillable =[
        'designation',
        'prix_u',
        'quantite_stock',
        'categorie_id',
        'photo',
    ];
    public function categorie(){
        return  $this->belongsTo(Categorie::class);
    }
    // public function scopeFilterByPrice($query, $minPrice, $maxPrice)
    // {
    //     if ($minPrice) {
    //         $query->where('prix_u', '>=', $minPrice);
    //     }

    //     if ($maxPrice) {
    //         $query->where('prix_u', '<=', $maxPrice);
    //     }

    //     return $query;
    // }
}
