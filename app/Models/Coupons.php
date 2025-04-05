<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $table = 'coupons_and_offers';
    protected $id = 'id';
    protected $fillable = ['coupons_name', 'coupons_code', 'start_date', 'end_date', 'min_order', 'discount_in_per', 'discount_in_ruppee', 'created_by'];
    public static function storeCoupon($data)
    {

        return self::create([
            'coupons_name' => $data['coupons_name'],
            'coupons_code' => $data['coupons_code'],
            // 'turf_id' => $data['turf_id'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'min_order' => $data['min_order'],
            'discount_in_per' => $data['discount_in_per'],
            'discount_in_ruppee' => $data['discount_in_ruppee'],
            'created_by' => $data['created_by'],
        ]);
    }  
}
