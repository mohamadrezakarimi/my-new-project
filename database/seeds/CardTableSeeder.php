<?php

use App\Card;
use Illuminate\Database\Seeder;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Card::truncate;

        factory(Card::class,10)->create();
    }
}
