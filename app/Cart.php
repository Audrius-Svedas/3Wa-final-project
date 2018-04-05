<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
      'token',
      'product_id',
    ];

    public function products()
    {
      return $this->belongsTo('App\Product', 'product_id');
    }

    public function orders()
    {
      return $this->belongsTo('App\Order', 'order_id');
    }
}
