<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampelTanah extends Model
{
    use HasFactory;
    protected $casts = [
        'images' => 'array',
    ];
    protected $fillable = ['title', 'weight', 'images', 'client_id', 'type_id', 'unit_id', 'objectivity_id'];

    // Many sampel tanahs belong to one client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Many sampel tanahs belong to one type
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Many sampel tanahs belong to one unit
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // Many sampel tanahs belong to one objectivity
    public function objectivity()
    {
        return $this->belongsTo(Objectivity::class);
    }
}
