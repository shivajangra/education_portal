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
            // ['name' => 'Pre Nursery', 'code' => 'PN'],
            // ['name' => 'Nursery', 'code' => 'N'],
            // ['name' => 'Junior Secondary (UKG)', 'code' => 'UKG'],
            // ['name' => 'Senior Secondary (LKG)', 'code' => 'LKG'],
            ['name' => 'First', 'code' => '1'],
            ['name' => 'Second', 'code' => '2'],
            ['name' => 'Third', 'code' => '3'],
            ['name' => 'Class IV', 'code' => '4'],
            ['name' => 'Class V', 'code' => '5'],
            ['name' => 'Class VI', 'code' => '6'],
            ['name' => 'Class VII', 'code' => '7'],
            ['name' => 'Class VIII', 'code' => '8'],
            ['name' => 'Class IX', 'code' => '9'],
            ['name' => 'Class X', 'code' => '10'],
            ['name' => 'Class XI', 'code' => '11'],
            ['name' => 'Class XII', 'code' => '12'],
        ];

        DB::table('class_types')->insert($data);

    }
}
