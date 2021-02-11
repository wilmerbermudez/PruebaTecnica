<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table ='order_items';
    protected $fillable =['precio','quantity','producto_id','order_id'];
}
