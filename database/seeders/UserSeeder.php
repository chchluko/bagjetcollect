<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Jesus Lopez',
            'email'=>'jesus.lopez@proa.com.mx',
            'password'=>bcrypt('99031016')
        ]);

        $user->assignRole('Admin');

      //  User::factory(99)->create();
    }
}
