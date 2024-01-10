<?php

namespace Database\Seeders;

use App\Models\Etat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        /*
            EN ATTENT DE CONFIRMATION
            CONFIRMER -> LIVREE -> ( PAYEE + RETOURNE )
            ENNULER

        */

        $etat_1 = Etat::create(["intitule"=>"EN ATTENT DE CONFIRMATION","description"=>"Lorem Empsom", "id_precedent"=>null]);
        $etat_2 = Etat::create(["intitule"=>"CONFIRMER","description"=>"Lorem Empsom", "id_precedent"=>$etat_1->id]);
        $etat_3 = Etat::create(["intitule"=>"LIVREE","description"=>"Lorem Empsom","id_precedent"=>$etat_2->id]);
        Etat::create(["intitule"=>"ENNULER","description"=>"Lorem Empsom", "id_precedent"=>$etat_1->id]);
        Etat::create(["intitule"=>"PAYEE","description"=>"Lorem Empsom", "id_precedent"=>$etat_3->id]);
        Etat::create(["intitule"=>"RETOURNE","description"=>"Lorem Empsom", "id_precedent"=>$etat_3->id]);
    }
}
