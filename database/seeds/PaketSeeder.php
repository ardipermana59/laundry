<?php

use Illuminate\Database\Seeder;
use App\Models\Packet;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$type = ['kiloan','selimut','bed_cover','kaos','lain'];
    	$packetName = ['express 6 jam', '12 jam', '1 hari'];
    	for ($i = 0; $i < count($type); $i++) {
    		for ($a = 0; $a < count($packetName) ; $a++) {
	    		Packet::create([
	    			'outlet_id' => 1,
					'type' => $type[$i],
					'packet_name' => $packetName[$a],
					'cost' => 700 * rand(1,10),
	    		]);
	    	}
    	}
    }
}
