<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['service_id','levelname','start_date','end_date','duration','price'];

    protected $table='levels';

    public $primarykey = 'id';

    public function service(){
        return $this->belongsTo(Service::class);
    }

    // public function student(){
    //     return $this->belongsTo();
    // }
}


