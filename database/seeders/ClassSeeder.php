<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassModel;
class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         for ($i = 1; $i <= 5; $i++) {
            ClassModel::create([
                'name' => 'Class ' . $i  
            ]);
        }
       
    }
}
