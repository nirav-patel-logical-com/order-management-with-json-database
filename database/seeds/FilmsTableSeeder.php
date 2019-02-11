<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $id= DB::table('films')->insertGetId([
            'name' => 'Test',
            'slug' => 'Test-1',
            'description' => 'Nice...',
            'realease_date' => '09/12/2018',
            'rating' => '2',
            'ticket_price' => '150',
            'country' => 'India',
            'genre' => 'Fun',
            'photo' => 'Hydrangeas1537529137.jpg',
            'add_date' => time(),
            'add_by' => 1,
        ]);

        DB::table('comment')->insertGetId([
            'film_id' => $id,
            'comment' => 'Nice Movie',
            'name' => 'Test',
            'add_date' => time(),
        ]);

        $id1= DB::table('films')->insertGetId([
            'name' => 'Test-2',
            'slug' => 'Test-2',
            'description' => 'Nice...',
            'realease_date' => '09/12/2018',
            'rating' => '2',
            'ticket_price' => '100',
            'country' => 'India',
            'genre' => 'Fun',
            'photo' => 'Hydrangeas1537529137.jpg',
            'add_date' => time(),
            'add_by' => 1,
        ]);

        DB::table('comment')->insert([
            'film_id' => $id1,
            'comment' => 'Nice Movie',
            'name' => 'Test',
            'add_date' => time(),
        ]);

       $id2 =  DB::table('films')->insertGetId([
            'name' => 'Test-3',
            'slug' => 'Test-3',
            'description' => 'Nice...',
            'realease_date' => '09/12/2018',
            'rating' => '2',
            'ticket_price' => '80',
            'country' => 'India',
            'genre' => 'Fun',
            'photo' => 'Hydrangeas1537529137.jpg',
            'add_date' => time(),
            'add_by' => 1,
        ]);


        DB::table('comment')->insertGetId([
            'film_id' => $id2,
            'comment' => 'Nice Movie',
            'name' => 'Test',
            'add_date' => time(),
        ]);
    }
}
