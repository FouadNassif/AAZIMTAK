<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'max_invitations',
        'customizable',
        'guest_management',
        'image_upload',
        'video_upload',
        'duration_days',
    ];

    /**
     * Relationship with User
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
