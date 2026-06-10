<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['day_of_week', 'start_time', 'finish_time', 'shift_type'])]
class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory, SoftDeletes;

    public function scheduleBookings(){
        return $this->hasMany(Booking::class, 'schedule_id');
    }

    public function getDayNameAttribute(): string
    {
        $days = [
            1 => 'Lunes',
            2 => 'Martes',
            3 => 'Miércoles',
            4 => 'Jueves',
            5 => 'Viernes',
            6 => 'Sábado',
            7 => 'Domingo'
        ];

        return $days[$this->day_of_week] ?? 'Desconocido';
    }
}
