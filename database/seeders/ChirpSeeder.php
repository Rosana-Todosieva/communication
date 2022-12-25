<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\Chirp;
use App\Models\Server;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChirpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a Chirp (assuming you have a Chirp model and migration)
        $chirp = Chirp::create([
            'user_id' => 1, // User 1
            'message' => 'Chirp by User 1',
        ]);

        // Create a Channel (assuming you have a Channel model and migration)
        $channel = Channel::create([
            'chirp_id' => $chirp->id,
            'name' => 'Channel 1',
        ]);

        // Create a Server (assuming you have a Server model and migration)
        $server = Server::create([
            'channel_id' => $channel->id,
            'name' => 'Your Server Name',
        ]);
    }

}
