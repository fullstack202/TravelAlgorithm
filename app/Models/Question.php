<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['variants', 'question', 'form_id', 'is_dealbreaker', 'created_at', 'updated_at'];
    protected $casts = ['variants' => 'array'];
}
