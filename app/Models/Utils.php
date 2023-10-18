<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utils extends Model
{
    use HasFactory;


    public static function calculateCommission(Payment $payment) {
        $commissionRate = $payment->commission_rate / 100;
    
        $commission = $payment->sales_amount * $commissionRate;
    
        return $commission;

        
    }

    
}
