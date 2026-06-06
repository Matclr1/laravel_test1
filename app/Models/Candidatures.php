<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Candidatures extends Model
{
    
        protected $fillable = [
            'company',
            'position',
            'status',
            'applied_at'
        ];
}
