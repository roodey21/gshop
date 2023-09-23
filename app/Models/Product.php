<?php

namespace App\Models;

use App\Models\Category;
use Spatie\Sluggable\HasSlug;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'description',
        'price',
        'discount',
        'stock',
        'weight',
        'status',
        'category_id',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(305)
            ->height(285)
            ->sharpen(10)
            ->nonOptimized();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getThumbnailAttribute()
    {
        return $this->getFirstMediaUrl('product-images', 'thumb') ?: asset('shop/images/resource/products/1.png');
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp. '.number_format($this->price, 0, ',', ',');
    }

    public function getFormattedDiscountAttribute()
    {
        if (!$this->discount) return '-';
        return 'Rp. '.number_format($this->discount, 0, ',', ',');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function transactionsDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function getAverageRatingAttribute()
    {
        return 'nanti';
    }
}
