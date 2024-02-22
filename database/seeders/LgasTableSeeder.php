<?php
namespace Database\Seeders;

use App\Models\Lga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LgasTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('lgas')->delete();

        $stateAbbrivations = [
            ["Andhra Pradesh", 1],
            ["Arunachal Pradesh", 2],
            ["Assam", 3],
            ["Bihar", 4],
            ["Chhattisgarh", 5],
            ["Goa", 6],
            ["Gujarat", 7],
            ["Haryana", 8],
            ["Himachal Pradesh", 8],
            ["Jammu and Kashmir", 9],
            ["Jharkhand", 10],
            ["Karnataka", 11],
            ["Kerala", 12],
            ["Madhya Pradesh", 13],
            ["Maharashtra", 14],
            ["Manipur", 15],
            ["Meghalaya", 16],
            ["Mizoram", 17],
            ["Nagaland", 18],
            ["Odisha", 19],
            ["Punjab", 20],
            ["Rajasthan", 21],
            ["Sikkim", 22],
            ["Tamil Nadu", 23],
            ["Telangana", 24],
            ["Tripura", 25],
            ["Uttarakhand", 26],
            ["Uttar Pradesh", 27],
            ["West Bengal", 28],
            ["Andaman and Nicobar Islands", 29],
            ["Chandigarh", 30],
            ["Dadra and Nagar Haveli", 31],
            ["Daman and Diu", 32],
            ["Delhi", 33],
            ["Lakshadweep", 34],
            ["Puducherry", 35]
        ];

        for($i=0; $i<count($stateAbbrivations); $i++){
            Lga::create(['state_id' => $stateAbbrivations[$i][1], 'name' => $stateAbbrivations[$i][0]]);
        }
    }

}
