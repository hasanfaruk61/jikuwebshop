<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'address1',
        'address2',
        'phone',
        'city',
        'country',
        'zip_code',
        'status',
        'total_price',

    ];

    public function orderitems()
   {
    return $this->hasMany(OrderItem::class);
   }
}
