<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$data = [
        	'user_level'=>2,
        	'name'=>'Bella',
        	'email'=>'ekabella@gmail.com',
        	'password'=>bcrypt('bella'),
        	'alamat'=>'Kendal City',
        	'no_telp'=>'08985716073'
        ];*/
        $data = [
            'user_level'=>1,
            'name'=>'Roisul',
            'email'=>'rois@gmail.com',
            'password'=>bcrypt('roisul'),
            'alamat'=>'Demak City',
            'no_telp'=>'08985716073'
        ];

        User::create($data);
    }
}
