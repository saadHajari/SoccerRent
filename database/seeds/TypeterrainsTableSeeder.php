<?php

use Illuminate\Database\Seeder;
use App\Typeterrain ;


class TypeterrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeterrain = new Typeterrain();
        $typeterrain->type_name = "Synthetiqe";
        $typeterrain->save();

         $typeterrain2 = new Typeterrain();
        $typeterrain2->type_name = "naturel";
        $typeterrain2->save();


         $typeterrain3 = new Typeterrain();
        $typeterrain3->type_name = "5V5";
        $typeterrain3->save();


         $typeterrain4 = new Typeterrain();
        $typeterrain4->type_name = "10V10";
        $typeterrain4->save();
    }
}
