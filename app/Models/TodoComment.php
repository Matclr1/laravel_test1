<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoComment extends Model
{
   use \Illuminate\Database\Eloquent\Factories\HasFactory;

   protected $fillable = [
        'content',
        'todo_id'
    ];
    public function todo(){
        return $this->belongsTo(Todo::class);
    }
    
}
