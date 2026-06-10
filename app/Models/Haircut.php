<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['name', 'description', 'price', 'duration'])]
class Haircut extends Model
{
    /** @use HasFactory<\Database\Factories\HaircutFactory> */
    use HasFactory, SoftDeletes;

    public function haircutBookings(){
        return $this->hasMany(Booking::class, 'haircut_id');
    }
}
