<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Service;

class Payment extends Model
{
    use HasFactory;
    // protected $fillable = [''];
     /**
     * Get the customer that owns the Purchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->hasMany(Student::class,'id','student_id');
    }

    /**
     * Get the service that owns the Purchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->hasMany(Service::class,'id','student_id');
    }
    
}
