<?php

namespace App;

use App\Color;
use Carbon\Carbon;
use App\SubCategory;
use App\ProductPicture;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sub_category_id',  'name', 'description', 'order', 'extra', 'outstanding', 'material', 'capacity', 'amount', 'cover', 'color', 'weight', 'offers', 'info'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function isNew()
    {
        if (Carbon::now()->diffInDays($this->created_at) < 21) 
            return true;
    } 
}
