<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $table = 'coupons_and_offers';
    protected $id = 'id';
    protected $fillable = ['coupons_name', 'coupons_code', 'start_date', 'end_date', 'min_order', 'discount_in_per', 'discount_in_ruppee', 'created_by'];
    public function creaters()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function turf()
    {
        return $this->belongsTo(Turf::class, 'turf_id');
    }
    public static function generateCouponCode()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        return 'END' . substr(str_shuffle($characters), 0, 2);
    }
    public static function storeCoupon($data)
    {
        $data['coupons_code'] = self::generateCouponCode(); // Always generate new code

        return self::create($data);

    }  
    public static function couponsdelete($id)
    {
        $coupons = self::find($id);
        if (!$coupons) {
            return null;
        }
    
        $coupons->delete();

        return ['message' => 'Coupon deleted successfully'];
    }
    public static function getcoupons() 
    {
        $today = now();
        $startOfMonth = $today->copy()->startOfMonth();
        $endOfMonth = $today->copy()->endOfMonth();
    
        return self::whereDate('start_date', '<=', $endOfMonth)
                   ->whereDate('end_date', '>=', $startOfMonth)
                   ->get();
    }
    // public static function getcoupon() {
    //     return self::all();
    // }
    
}
