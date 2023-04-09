<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyProfile extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;
    protected $guarded = [];
    // public function work()
    // {
    //     return $this->hasMany(WorkType::class, 'company_profile_id');
    // }

    // public function expense()
    // {
    //     return $this->hasMany(Expense::class, 'company_profile_id');
    // }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')
    //         ->width(200)
    //         ->height(200);
    // }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this
    //         ->addMediaConversion('preview')
    //         ->fit(Manipulations::FIT_CROP, 300, 300)
    //         ->nonQueued();
    // }
}