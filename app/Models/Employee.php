<?php

namespace App\Models;

use Encore\Admin\Form\Field\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function payments(){
        return $this->hasMany(Payment::class,'employee_id');
    }
    public function task(){
        return $this->belongsTo(Task::class,'employee_id');
    }
    public function departments(){
        return $this->BelongsTo(Department::class,'employee_id');
    }
    protected $fillable = 
    [
    'name', 
    'photo', 
    'email', 
    'phone', 
    'age', 
    'gender', 
    'department', 
    'designation', 
    'hire_date'
];
/* public function setPhotoAttribute($pics)
{
    if (is_array($pics)) {
        $this->attributes['photo'] = json_encode($pics);
    }
}
public function getPhotoAttribute($pics)
{
    return json_decode($pics, true);
   if (is_array($pics)) {
        $this->attributes['photo'] = json_encode($pics);
    } 
}
 */

}




