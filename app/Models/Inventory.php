<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        
        'description',
        // 'reference',
        // 'location',
        'user_id',
        'document',
        'status',
    ];

    // Relaciones (si las necesitas más adelante)
  
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
{
    return $this->hasMany(InventoryDetail::class);
}

}
