<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transaksi;
use Faker\Generator as Faker;

$factory->define(Transaksi::class, function (Faker $faker) {
	
	$paid = ['dibayar','belum_dibayar'];
	$status = ['baru','proses','selesai','diambil'];
    return [
    	'outlet_id' => 1,
    	'member_id' => rand(1,15),
    	'user_id' => 3,
    	'packet_id' => 1,
        'invoice_code' => 'KODE/INCOVIE',
		'deadline' => now(),
		'pay_date' => now(),
		'cost_additional' => 0,
		'discon' => 0,
		'tax' => 0,
		'total' => 150000,
		'status' => $status[array_rand($status)],
		'paid' => $paid[array_rand($paid)],
    ];
});
