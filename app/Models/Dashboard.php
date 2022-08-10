<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;
    /**
    * Get the purchase that owns the Purchase
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function purchase()
   {
       return $this->belongsTo(Purchase::class);
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
    * Get the payment that owns the Payment
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    /**
    * Get the customer that owns the Customer
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function customer()
   {
       return $this->belongsTo(Customer::class);
   }
}
