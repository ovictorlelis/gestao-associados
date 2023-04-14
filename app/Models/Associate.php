<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associate extends Model
{
    use HasFactory;

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function holder()
    {
        return $this->belongsTo(Associate::class, 'holder_id');
    }

    public function dependents()
    {
        return $this->hasMany(Associate::class, 'holder_id');
    }
}
