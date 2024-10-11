<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Books', 'type' => 'Shopping'],
            ['name' => 'Stationaries', 'type' => 'Shopping'],
            ['name' => 'Gadget Items', 'type' => 'Shopping'],
            ['name' => 'Others', 'type' => 'Shopping'],
            ['name' => 'Apartment', 'type' => 'To-Let'],
            ['name' => 'Room', 'type' => 'To-Let'],
            ['name' => 'Seat', 'type' => 'To-Let'],
            ['name' => 'Others', 'type' => 'To-Let'],
        ];

        DB::table('categories')->insert($categories);
    }
}
