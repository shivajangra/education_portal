<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => 'Pre Nursery', 'code' => 'PN'],
            ['name' => 'Nursery', 'code' => 'N'],
            ['name' => 'Junior Secondary (UKG)', 'code' => 'UKG'],
            ['name' => 'Senior Secondary (LKG)', 'code' => 'LKG'],
            ['name' => 'Fisrt', 'code' => '1'],
            ['name' => 'Second', 'code' => '2'],
            ['name' => 'Third', 'code' => '3'],
            ['name' => 'Fourth', 'code' => '4'],
            ['name' => 'Fifth', 'code' => '5']
        ];

        DB::table('class_types')->insert($data);

    }
}
