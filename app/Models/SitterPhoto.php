<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitterPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'sitter_id','image'
    ];
}
