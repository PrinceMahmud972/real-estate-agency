<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function upazila() {
        return $this->belongsTo(Upazila::class, 'address_id');
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }
}
