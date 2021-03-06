<?php

use Illuminate\Database\Seeder;
use App\Models\Outlet;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Outlet::create([
            'name' => 'ARL Laundry',
            'address' => 'Jl. Raya Pagaden km 12',
            'tlp' => '0821345678112',
        ]);
    }
}
