<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;


class Guest extends Model
{

    protected $connection = 'mongodb';
    protected $collection = 'guest_entries';
    
    protected $fillable = ['name', 'email', 'message', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
