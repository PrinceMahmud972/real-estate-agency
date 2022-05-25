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

    public function scopeFilter($query) {
        if(request()->has('location')) {
            $query->where('address_id', request('location'));
        }
        if(request()->has('type')) {
            $query->where('type_id', request('type'));
        }
        if(request()->has('purpose')) {
            $query->where('purpose', request('purpose'));
        }

        return $query;
    }
}
