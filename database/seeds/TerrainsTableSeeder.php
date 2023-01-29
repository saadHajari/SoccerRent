<?php

use Illuminate\Database\Seeder;
use App\Terrain ;
class TerrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $terrain = new Terrain();
        $terrain->Description = "Hey edezezrzerz";
        $terrain->type_id = 1;
        $terrain->save();

         $terrain2 = new Terrain();
        $terrain2->Description = "attenrter";
        $terrain2->type_id = 3;
        $terrain2->save();

    }
}
