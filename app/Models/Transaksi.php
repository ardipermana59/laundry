<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use SoftDeletes;
    
    protected $table = 'transaksis';
    protected $fillable = [
    	'outlet_id', 'invoice_code', 'member_id', 'packet_id', 'tgl', 'deadline', 'pay_date', 'cost_additional', 'discon', 'tax', 'status', 'total', 'paid', 'user_id'
    ];

    public function outlet()
    {
        return $this->belongsTo('App\Models\Outlet');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
