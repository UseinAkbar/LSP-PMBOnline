<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
require 'vendor/autoload.php';

use League\Csv\Reader;
use League\Csv\Statement;
use App\models\User;
use App\models\Agama;
use App\models\Provinsi;
use App\models\Kabupaten;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'nama'=> 'Admin',
            'email'=>'admin@admin.com',
            'password' => Hash::make('admin123'),
            'isAdmin' => 1,
         ]);

         Agama::create([
            'nama_agama'=> 'Islam'
         ]);

         Agama::create([
            'nama_agama'=> 'Katolik'
         ]);

         Agama::create([
            'nama_agama'=> 'Kristen'
         ]);

         Agama::create([
            'nama_agama'=> 'Hindu'
         ]);

         Agama::create([
            'nama_agama'=> 'Buddha'
         ]);

         Agama::create([
            'nama_agama'=> 'Lain-lain'
         ]);
        
         $csvKabupaten = Reader::createFromPath('daftar-kabupaten-kota-di-indonesia-excel.csv', 'r');
         $csvProvinsi = Reader::createFromPath('provinsi.csv', 'r');
         
         $csvKabupaten->setHeaderOffset(0); 
 
         $stmt = Statement::create()
             ->offset(1)
             ->limit(600);
 
         $recordsKabupaten = $stmt->process($csvKabupaten);
         $recordsProvinsi = $stmt->process($csvProvinsi);
 
         foreach ($recordsKabupaten as $recordK) {
             $name = implode(", ", $recordK);
             $name = substr($name, strpos($name, ' ') + 1);
 
             if (stripos($name, 'Daftar') === false && stripos($name, 'oleh') === false) {
                 // Remove trailing comma
                 $name = rtrim($name, ', ');
 
                 // Insert data into the database
                 Kabupaten::create([
                     'nama_kabupaten' => $name,
                 ]);
             }
         }

         foreach ($recordsProvinsi as $recordP) {
            $name = implode(", ", $recordP);
            
            Provinsi::create([
                'nama_provinsi' => $name,
            ]);
        }


      
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
