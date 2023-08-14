<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'description',
        'is_active',
        'event_start',
        'event_end',
        'room_id',
    ];


    public function room(): BelongsTo{

        return $this->belongsTo(Room::class);
    }

    public function user(){

        return $this->belongsToMany(User::class, 'event_user', 'user_id', 'event_id');
    }

}
