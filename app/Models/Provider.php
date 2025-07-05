<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'contact_name',
        'email',
        'phone',
        'address',
        'description',
        'status',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
