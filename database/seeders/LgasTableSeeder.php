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
            ["Andhra Pradesh", "AP"],
            ["Arunachal Pradesh", "AR"],
            ["Assam", "AS"],
            ["Bihar", "BR"],
            ["Chhattisgarh", "CG"],
            ["Goa", "GA"],
            ["Gujarat", "GJ"],
            ["Haryana", "HR"],
            ["Himachal Pradesh", "HP"],
            ["Jammu and Kashmir", "JK"],
            ["Jharkhand", "JH"],
            ["Karnataka", "KA"],
            ["Kerala", "KL"],
            ["Madhya Pradesh", "MP"],
            ["Maharashtra", "MH"],
            ["Manipur", "MN"],
            ["Meghalaya", "ML"],
            ["Mizoram", "MZ"],
            ["Nagaland", "NL"],
            ["Odisha", "OD"],
            ["Punjab", "PB"],
            ["Rajasthan", "RJ"],
            ["Sikkim", "SK"],
            ["Tamil Nadu", "TN"],
            ["Telangana", "TS"],
            ["Tripura", "TR"],
            ["Uttarakhand", "UK"],
            ["Uttar Pradesh", "UP"],
            ["West Bengal", "WB"],
            ["Andaman and Nicobar Islands", "AN"],
            ["Chandigarh", "CH"],
            ["Dadra and Nagar Haveli", "DN"],
            ["Daman and Diu", "DD"],
            ["Delhi", "DL"],
            ["Lakshadweep", "LD"],
            ["Puducherry", "PY"]
        ]

        for($i=0; $i<count($stateAbbrivations); $i++){
            Lga::create(['state_id' => $stateAbbrivations[$i][1], 'name' => $stateAbbrivations[$i][0]]);
        }
    }

}
