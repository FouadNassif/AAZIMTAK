<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_id',
        'name',
        'message',
        'attending_status',
        'wedding_link',
        'number_of_people',
        'number_of_kids',
        'status_changed',
    ];
}
