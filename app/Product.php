<?php

namespace App;

use App\Helpers\PhotoHelper;
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

  public function getUrlAttribute()
  {
    $photoHelper = app(PhotoHelper::class);
    // siuo atveju dvitaskiai nereiskia statinio metodo, tai reiskia klases nurodyma (kuri siuo atveju yra aprasyta PhotoHelper faile)
    return $photoHelper->generateUrl($this);
  }
}
