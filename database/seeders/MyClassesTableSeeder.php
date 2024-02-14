<?php
namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MyClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_classes')->delete();
        $ct = ClassType::pluck('id')->all();

        $data = [
            ['name' => 'Pre Nursery', 'class_type_id' => $ct[0]],
            ['name' => 'Nursery', 'class_type_id' => $ct[1]],
            ['name' => 'Junior Secondary (UKG)', 'class_type_id' => $ct[2]],
            ['name' => 'Senior Secondary (LKG)', 'class_type_id' => $ct[3]],
            ['name' => 'Fisrt', 'class_type_id' => $ct[4]],
            ['name' => 'Second', 'class_type_id' => $ct[5]],
            ['name' => 'Third', 'class_type_id' => $ct[6]],
            ['name' => 'Fourth', 'class_type_id' => $ct[7]],
            ['name' => 'Fifth', 'class_type_id' => $ct[8]],
            ];

        DB::table('my_classes')->insert($data);

    }
}
