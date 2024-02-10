<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Database\Seeders\EtatSeeder;
use Database\Seeders\ProduitSeeder;
use Database\Seeders\CategorieSeeder;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorieSeeder::class,
            ProduitSeeder::class,
            EtatSeeder::class,
        ]);

        // create permissions
        Permission::create(['name' => 'publish produit',"guard_name"=>"web"]);
        Permission::create(['name' => 'publish categorie',"guard_name"=>"web"]);
        Permission::create(['name' => 'publish commande',"guard_name"=>"web"]);

        Permission::create(['name' => 'edit produit',"guard_name"=>"web"]);
        Permission::create(['name' => 'edit categorie',"guard_name"=>"web"]);
        Permission::create(['name' => 'edit commande',"guard_name"=>"web"]);

        Permission::create(['name' => 'delete produit',"guard_name"=>"web"]);
        Permission::create(['name' => 'delete categorie',"guard_name"=>"web"]);
        Permission::create(['name' => 'delete commande',"guard_name"=>"web"]);

        $role = Role::create(['name' => 'super-admin',"guard_name"=>"web"]);
        $role->givePermissionTo(Permission::all());


    }
}
