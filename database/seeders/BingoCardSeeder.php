<?php

namespace Database\Seeders;

use App\Models\BingoCard;
use Illuminate\Database\Seeder;

class BingoCardSeeder extends Seeder
{
    public function run(): void
    {
        BingoCard::factory(15)->create();
    }
}
