<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id','sitter_id','pet_confirmed','sitter_confirmed','hours','hourly_cost','reciever_id'
    ];

    /**
     * Get the pet that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id', 'id');
    }

    /**
     * Get the sitter that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sitter()
    {
        return $this->belongsTo(Sitter::class, 'sitter_id', 'id');
    }

    /**
     * Get all of the files for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(File::class, 'order_id', 'id');
    }
}
