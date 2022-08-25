<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name','mobile','email','address','service_id','Total_fee'];
    
    public function service(){
        return $this->belongsTo(Service::class);
    }
    
    public function payment(){
        return $this->hasMany(Payment::class,'id','student_id');
    }

}
