<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
	use SoftDeletes;
	
    protected $table = 'packets';
    protected $fillable = [
    	'outlet_id', 'type', 'packet_name', 'cost'
    ];

    public function outlet()
    {
        return $this->belongsTo('App\Models\Outlet');
    }
}
