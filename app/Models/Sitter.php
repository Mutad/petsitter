<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitter extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id','description','image'
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
     * Get the user associated with the Sitter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'account_id');
    }

    /**
     * Get all of the services for the Sitter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany(Service::class, 'sitter_id', 'id');
    }

    /**
     * Get all of the orders for the Sitter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'sitter_id', 'id');
    }

    /**
     * Get all of the photos for the Sitter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(SitterPhoto::class, 'sitter_id', 'id');
    }
}
