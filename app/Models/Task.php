<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
public function tasks(){
    return $this->hasmany(Employee::class,'employee_id');
}
protected $fillable = 
    [
    'Title', 
    'employee_id', 
    'status', 
    'due_date', 
    'description'
    
];
}

