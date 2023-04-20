<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function company_profile()
    {
        return $this->belongsTo(CompanyProfile::class);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this
    //         ->addMediaConversion('preview')
    //         ->fit(Manipulations::FIT_CROP, 300, 300)
    //         ->nonQueued();
    // }
}