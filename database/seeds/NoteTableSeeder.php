<?php

use App\Note;
use Illuminate\Database\Seeder;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Note::truncate();

        factory(Note::class,10)->create();
    }
}
