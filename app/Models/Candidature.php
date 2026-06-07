<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    
        protected $fillable = [
            'company',
            'position',
            'status',
            'applied_at'
        ];
}
