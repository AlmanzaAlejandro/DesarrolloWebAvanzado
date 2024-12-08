<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Definir los campos que son asignables en masa (mass assignable)
    protected $fillable = [
        'title', 'description', 'event_date', 'location',
    ];
}
