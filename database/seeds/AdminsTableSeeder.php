<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $admin = new Admin();
        $admin->first_name = 'Francois';
        $admin->last_name = 'Joe';
        $admin->username = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('password');
        $admin->picture = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZD7MAggMbeqjnx7O9VyVvhjGDvMqBT6d4IrVQDPSF0kSRIPve';
        $admin->save();

        $admin2 = new Admin();
        $admin2->first_name = 'saad';
        $admin2->last_name = 'Hajari';
        $admin2->username = 'saad36';
        $admin2->email = 'saad@saad.com';
        $admin2->password = bcrypt('123456789');
        $admin2->picture = '123.png';
        $admin2->isadming = 1 ;
        $admin2->save();
    }
}
