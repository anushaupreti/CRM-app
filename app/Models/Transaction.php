<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * Get the customer that owns the Purchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the service that owns the Purchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    /**
     * Get the purchase that owns the Purchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
