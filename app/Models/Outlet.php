<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use SoftDeletes;
    
    protected $table = 'outlets';
    protected $fillable = [
    	'name','address','tlp'
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function pakets()
    {
        return $this->hasMany('App\Models\Paket');
    }

    public function transaksis()
    {
        return $this->hasMany('App\Models\Transaksi');
    }
}
