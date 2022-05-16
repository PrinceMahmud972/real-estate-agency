<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    public function districts() {
        return $this->hasMany(District::class);
    }

    public function upazilas() {
        return $this->hasManyThrough(Upazila::class, District::class);
    }

}
