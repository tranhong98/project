<?php

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cards = [
            [
                'user_id' => '1',
                'password' => '6789',
                'confirm' => '1',
            ],
            [
                'user_id' => '2',
                'password' => '674545',
                'confirm' => '0',
            ],
            [
                'user_id' => '3',
                'password' => '9898',
                'confirm' => '1',
            ],
        ];
        foreach ($cards as $card) {
            Card::create($card);
        };
    }
}
