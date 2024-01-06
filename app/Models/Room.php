<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function category_rooms()
    {
        return $this->belongsTo(CategoryRoom::class, 'category_room_id', 'id');
    }
}
