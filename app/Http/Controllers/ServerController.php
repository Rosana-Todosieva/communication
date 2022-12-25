<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;

class ServerController extends Controller
{
    // ... Other methods as shown previously

    /**
     * Show the channels of a specific server.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showChannels($id)
    {
        $server = Server::findOrFail($id);
        $channels = $server->channels;

        return view('servers.channels', compact('server', 'channels'));
    }
}
