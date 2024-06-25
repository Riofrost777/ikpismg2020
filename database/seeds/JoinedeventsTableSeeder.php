<?php

use Illuminate\Database\Seeder;

class JoinedeventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('joinedevents')->insert(
        array(
            'user_id' => '3',
            'event_id' => '1',
            'status' => 0,
            'created_at' => now()
            )
        );

        DB::table('joinedevents')->insert(
        array(
            'user_id' => '3',
            'event_id' => '2',
            'status' => 0,
            'created_at' => now()
            )
        );

        DB::table('joinedevents')->insert(
        array(
            'user_id' => '21',
            'event_id' => '1',
            'status' => 0,
            'created_at' => now()
            )
        );

        DB::table('joinedevents')->insert(
        array(
            'user_id' => '27',
            'event_id' => '1',
            'status' => 0,
            'created_at' => now()
            )
        );

        DB::table('joinedevents')->insert(
        array(
            'user_id' => '27',
            'event_id' => '3',
            'status' => 0,
            'created_at' => now()
            )
        );

        DB::table('joinedevents')->insert(
        array(
            'user_id' => '55',
            'event_id' => '2',
            'status' => 0,
            'created_at' => now()
            )
        );
    }
}
