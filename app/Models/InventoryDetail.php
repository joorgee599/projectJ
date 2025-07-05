<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryDetail extends Model
{

    use HasFactory;
    
   protected $table = 'inventories_details';
      

    protected $fillable = [
        'inventory_id',
        'product_id',
        'provider_id',
        'type',
        'quantity',
    ];


      public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function inventory()
{
    return $this->belongsTo(Inventory::class);
}


}
