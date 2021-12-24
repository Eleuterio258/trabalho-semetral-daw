<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'delivery';
    use HasFactory;


    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function run()
    {
        User::factory()
            ->count(50)
            ->hasPosts(1)
            ->create();
    }
}
