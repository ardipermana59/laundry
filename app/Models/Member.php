<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	use SoftDeletes;
	
    protected $table = 'members';
    protected $fillable = [
    	'name', 'address','gender', 'tlp'
    ];

    public function transaksis()
    {
        return $this->hasMany('App\Models\Transaksi');
    }
}
