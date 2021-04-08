<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'description','rating','sender_id','reviewable_type','reviewable_id'
    ];

    public function reviewable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user associated with the Review
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sender()
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }
}
