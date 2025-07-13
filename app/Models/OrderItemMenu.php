<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemMenu extends Model
{
    public function orderItem(){
        return $this->belongsTo(OrderItem::class);
    }
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
