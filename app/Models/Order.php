<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
    protected $guarded = [
        'id',
    ];
}
