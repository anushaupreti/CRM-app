<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = ['service_id','duration','level_name','start_date','end_date','price'];

    public function service(){
        return $this->belongsTo(Service::class);
    }
}


