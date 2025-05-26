<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Jenssegers\Mongodb\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class EventMessage extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'event_messages';

    protected $fillable = [
        'content',
        'event_id',
        'user_id'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
