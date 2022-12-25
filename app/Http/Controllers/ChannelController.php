<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;

class ChannelController extends Controller
{
    /**
     * Create a new channel.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:channels', // Assuming a unique name for channels
        ]);

        // Create a new channel
        $channel = Channel::create([
            'name' => $request->input('name'),
            // You can add any other necessary fields here
        ]);

        return response()->json([
            'message' => 'Channel created successfully',
            'channel' => $channel,
        ], 201);
    }

    /**
     * List all channels.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Retrieve a list of all channels
        $channels = Channel::all();

        return response()->json([
            'channels' => $channels,
        ]);
    }
}


