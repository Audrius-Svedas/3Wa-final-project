<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
    'manufacturer',
    'model',
    'quantity',
    'category',
    'frame_size',
    'frame',
    'fork',
    'gear_shifters',
    'front_delailleur',
    'rear_delailleur',
    'brakes',
    'gears_amount',
    'wheel_size',
    'weight',
    'price',
    'description',
    'imageUrl'
  ];
}
