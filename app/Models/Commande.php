<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commande extends Model
{
    use HasFactory;
   protected $table = "commande";

    protected $fillable=[
        "client_id",
        "etat_id"
    ];
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function produit(){
        return $this->belongsTo(Produit::class);
     }
    public function etat(){
        return $this->hasOne(Etat::class,"id");
    }

    // protected function 
}
