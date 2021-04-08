<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id','name','description','type','weight','image','hourly_rate'
    ];

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function getRatingAttribute()
    {
        if ($this->reviews()->count()==0)
            return 0;
        return number_format((float)($this->reviews()->sum('rating')/$this->reviews()->count()), 2, '.', '');
    }

    /**
     * Get the user that owns the Pet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
