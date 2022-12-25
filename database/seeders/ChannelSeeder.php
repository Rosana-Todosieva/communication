<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Channel::create([
            'name' => 'Main',
            'chirp_id' => 0,
        ]);
        Channel::create([
            'name' => 'New',
            'chirp_id' => 0,
        ]);
    }
}
