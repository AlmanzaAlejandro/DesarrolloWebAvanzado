<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'title' => 'Conferencia de Laravel',
            'description' => 'Un evento de aprendizaje sobre Laravel.',
            'event_date' => '2024-12-15',
            'location' => 'Auditorio Principal, Ciudad',
        ]);

        Event::create([
            'title' => 'Taller de PHP',
            'description' => 'Un taller práctico sobre PHP y desarrollo web.',
            'event_date' => '2024-12-20',
            'location' => 'Sala de Conferencias, Ciudad',
        ]);

    }
}
