<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment')->insert([
            'film_id' => '6',
            'comment' => 'Nice Movie',
            'name' => 'Test',
            'add_date' => time(),
        ]);
        DB::table('comment')->insert([
            'film_id' => '7',
            'comment' => 'Nice Movie',
            'name' => 'Test',
            'add_date' => time(),
        ]);

        DB::table('comment')->insert([
            'film_id' => '8',
            'comment' => 'Nice Movie',
            'name' => 'Test',
            'add_date' => time(),
        ]);

    }
}
