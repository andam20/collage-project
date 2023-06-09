<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function companyProfile()
    {
        return $this->belongsTo(CompanyProfile::class);
    }

    // public function founder()
    // {
    //     return $this->belongsTo(Founder::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
