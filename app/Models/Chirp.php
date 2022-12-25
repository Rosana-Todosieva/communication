<?php

namespace App\Models;

use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
    ];

    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // In Chirp.php
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    protected static function booted()
    {
        static::creating(function ($chirp) {
            if ($chirp->channel_id === null && $chirp->server_id !== null) {
                // Get the default channel for the server
                $defaultChannel = Channel::where('server_id', $chirp->server_id)
                    ->orderBy('id')
                    ->first();

                if ($defaultChannel) {
                    $chirp->channel_id = $defaultChannel->id;
                }
            }
        });
    }

}
