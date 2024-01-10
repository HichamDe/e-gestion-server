<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
   protected $table = "client";
    protected $fillable = [
        "nom",
        "prenom",
        "ville",
        "adresse",
        "tele"
    ];
    protected function commande(){
        return $this->hasMany(Commande::class);
    }
}
