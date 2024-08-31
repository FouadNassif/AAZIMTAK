<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_id',
        'wedding_date',
        'ceremony_place',
        'ceremony_time',
        'ceremony_city',
        'ceremony_maps',
        'party_place',
        'party_time',
        'party_city',
        'party_maps',
        'gift_type',
        'gift_details'
    ];
}
