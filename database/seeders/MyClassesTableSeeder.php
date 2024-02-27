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
            // ['name' => 'Pre Nursery', 'fees' => 500, 'class_type_id' => $ct[0]],
            // ['name' => 'Nursery', 'fees' => 500, 'class_type_id' => $ct[1]],
            // ['name' => 'Junior Secondary (UKG)', 'fees' => 500, 'class_type_id' => $ct[2]],
            // ['name' => 'Senior Secondary (LKG)', 'fees' => 500, 'class_type_id' => $ct[3]],
            ['name' => 'First', 'fees' => 500, 'class_type_id' => $ct[0]],
            ['name' => 'Second', 'fees' => 500, 'class_type_id' => $ct[1]],
            ['name' => 'Third', 'fees' => 500, 'class_type_id' => $ct[2]],
            ['name' => 'Class IV', 'fees' => 500, 'class_type_id' => $ct[3]],
            ['name' => 'Class V', 'fees' => 500, 'class_type_id' => $ct[4]],
            ['name' => 'Class VI', 'fees' => 500, 'class_type_id' => $ct[5]],
            ['name' => 'Class VII', 'fees' => 500, 'class_type_id' => $ct[6]],
            ['name' => 'Class VIII', 'fees' => 500, 'class_type_id' => $ct[7]],
            ['name' => 'Class IX', 'fees' => 500, 'class_type_id' => $ct[8]],
            ['name' => 'Class X', 'fees' => 500, 'class_type_id' => $ct[8]],
            ['name' => 'Class XI', 'fees' => 500, 'class_type_id' => $ct[10]],
            ['name' => 'Class XII', 'fees' => 500, 'class_type_id' => $ct[11]],
            ];

        DB::table('my_classes')->insert($data);

    }
}
