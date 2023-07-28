<?php
namespace App\Models;



use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function skus(): HasMany
    {
        return $this->hasMany(Sku::class);
    }
}
