<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['invoice_id', 'price', 'delivery_fee', 'description', 'total', 'tax'];
}
