<?php

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
        $users = ['owner','admin','kasir'];
        foreach ($users as $user) {
            User::create([
                'name' => ucfirst($user) . ' Laundry',
                'username' => $user,
                'password' => Hash::make($user),
                'outlet_id' => 1,
                'role' => $user,
                'code' => substr($user, 0,3),
            ]);
        }

    }
}
