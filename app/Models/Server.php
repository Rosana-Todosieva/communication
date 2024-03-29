<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = ['name'];

    public function channels()
    {
        return $this->hasMany(Channel::class);
    }
}
