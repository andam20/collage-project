<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Accountant extends Model implements AuthenticatableContract
{
    use HasFactory,Authenticatable;


    protected $guarded = [];

   


    public static function attempt($email, $password)
    {
        $accountant = static::where('email', $email)->where('password', $password)->first();

        if ($accountant) {
            return $accountant;
        }

        return false;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
