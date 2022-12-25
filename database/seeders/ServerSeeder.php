<?php

namespace Database\Seeders;

use App\Models\Server;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $servers = [
            ['name' => 'Music'],
            ['name' => 'News'],
            // Add more servers as needed
        ];

        foreach ($servers as $serverData) {
            $server = Server::create($serverData);

            // Create default channels for each server
            $server->channels()->create([
                'name' => 'Main',
            ]);

            $server->channels()->create([
                'name' => 'New',
            ]);


        }
    }
}
