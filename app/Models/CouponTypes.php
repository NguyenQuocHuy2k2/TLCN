<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponTypes extends Model
{
    use HasFactory;
    protected $table = 'coupons_type';
    protected $primaryKey = 'coupon_type';
    public $timestamps = false;
}
