<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];
    public $incrementing = false;
    use HasFactory;
    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
    public function tamus()
    {
        return $this->belongsTo(Tamu::class, 'tamu_id', 'id');
    }
    // public function getTotalAttribute() {
    //     $jml = $this->checkout->diff($this->checkin);
    //     $total1 = $this->total * $jml;
    //     return $total1 + (($total1 * 10) / 100);
    // }
}
