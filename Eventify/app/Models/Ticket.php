<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'user_id',
        'event_id',
        'price',
        'quantity',
    ];

    /**
     * Relación con el modelo User.
     * Un ticket pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con el modelo Event.
     * Un ticket pertenece a un evento.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
