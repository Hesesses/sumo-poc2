<?php

namespace App\Models;

use DoubleThreeDigital\Runway\Routing\Traits\RunwayRoutes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    use RunwayRoutes;

    protected $fillable = [
        'slug',
        'type',
        'data',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
