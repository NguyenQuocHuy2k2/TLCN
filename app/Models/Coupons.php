<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $primaryKey = 'coupon_id';
    public $timestamps = false;
    protected $fillable = [
        'coupon_code',
        'coupon_type',
        'coupon_amount',
        'min_order',
        'coupon_remain',
        'coupon_used',
        'coupon_quantity',
        'coupon_expired'
    ];
}
