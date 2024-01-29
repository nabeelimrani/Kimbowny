<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
  public function wishlist()
  {
    return $this->belongsToMany(User::class, 'wishlists');
  }
     public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
    public function orders()
    {
      return $this->belongsToMany(Order::class);
    }
  public function colors()
  {
    return $this->belongsToMany(Color::class,"color_product");
  }
  public function sizes()
  {
    return $this->belongsToMany(Size::class,"product_size");
  }
      public function category()
    {
        return $this->belongsTo(Category::class);
    }
   public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
  public function pagelink()
  {

    return "product/" . strtolower(str_replace(' ', '-', $this->name));
  }

}
