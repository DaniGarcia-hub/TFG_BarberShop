<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['note', 'state', 'confirmation_date', 'booking_date', 'client_id', 'barber_id', 'schedule_id', 'haircut_id'])]
class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory, SoftDeletes;

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id')->withTrashed();  // Buscará en la tabla users cuando se vaya a rellenar el client_id
    }

    public function barber(): BelongsTo
    {
        return $this->belongsTo(User::class, 'barber_id')->withTrashed();  // Buscará en la tabla users cuando se vaya a rellenar el barber_id, pero se filtrará en los Resources.
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class)->withTrashed();  // Buscará en la tabla schedules cuando se vaya a rellenar el schedule_id.
    }

    public function haircut(): BelongsTo
    {
        return $this->belongsTo(Haircut::class)->withTrashed();  // Buscará en la tabla haircuts cuando se vaya a rellenar el haircut_id.
    }
}
