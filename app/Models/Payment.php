<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
    protected $fillable = 
    [
    'employee_id', 
    'payment_type', 
    'amount', 
    'paid_at'
   
    
];
}
    






