<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function order(){
        return $this->belongsTo(Order::class);
    }
    protected $guarded = [
        'id'
    ];
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
