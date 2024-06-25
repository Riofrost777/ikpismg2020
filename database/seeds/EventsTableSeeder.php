<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('events')->insert(
        array(
            'event_name' => 'Event 1',
            'event_category' => 'Seminar',
            'place' => 'Gumaya Hotel Ballroom, Semarang',
            'price_int' => 100000,
            'price_ext' => 200000,
            'quota' => 200,
            'event_start' => '2020-03-01 00:00:00',
            'event_end' => '2020-03-02 00:00:00',
            'description' => 'Deskripsi event 1',
            'SKPPL_type' => 2,
            'SKPPL' => 8,
            'created_at' => now(),
            'updated_at' => now()
            )
        );

        DB::table('events')->insert(
        array(
            'event_name' => 'Event 2',
            'event_category' => 'Workshop',
            'place' => 'Grand Inna Hotel Convention Hall, Yogyakarta',
            'price_int' => 50000,
            'price_ext' => 100000,
            'quota' => 100,
            'event_start' => '2020-03-05 00:00:00',
            'event_end' => '2020-03-06 00:00:00',
            'description' => 'Deskripsi event 2',
            'SKPPL_type' => 1,
            'SKPPL' => 4,
            'created_at' => now(),
            'updated_at' => now()
            )
        );

        DB::table('events')->insert(
        array(
            'event_name' => 'Event 3',
            'event_category' => 'Seminar',
            'place' => 'Kempinski Hotel Ballroom, Jakarta',
            'price_int' => 1500000,
            'price_ext' => 3000000,
            'quota' => 150,
            'event_start' => '2020-03-09 00:00:00',
            'event_end' => '2020-03-10 00:00:00',
            'description' => 'Deskripsi event 3',
            'SKPPL_type' => 2,
            'SKPPL' => 4,
            'created_at' => now(),
            'updated_at' => now()
            )
        );
    }
}
