<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['type' => 'current_session', 'description' => '2023-2024'],
            ['type' => 'system_title', 'description' => 'Inovx'],
            ['type' => 'system_name', 'description' => 'Inovx Edu'],
            ['type' => 'term_ends', 'description' => '10/02/2023'],
            ['type' => 'term_begins', 'description' => '7/10/2024'],
            ['type' => 'phone', 'description' => '9999315163'],
            ['type' => 'address', 'description' => '103, khushi Homes, Rajender Park, Gurgoan'],
            ['type' => 'system_email', 'description' => 'business@inovx.in'],
            ['type' => 'alt_email', 'description' => 'inovx.india@gmail.com'],
            ['type' => 'email_host', 'description' => ''],
            ['type' => 'email_pass', 'description' => ''],
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => ''],
            ['type' => 'next_term_fees_pn', 'description' => '25000'],
            ['type' => 'next_term_fees_n', 'description' => '25600'],
        ];

        DB::table('settings')->insert($data);

    }
}
