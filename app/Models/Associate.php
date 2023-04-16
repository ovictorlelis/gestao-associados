<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'card', 'document', 'rg', 'type', 'photo', 'pendency', 'holder_id', 'zip', 'address', 'state', 'fu', 'number', 'complement'];

    public function holder()
    {
        return $this->belongsTo(Associate::class, 'holder_id');
    }

    public function dependents()
    {
        return $this->hasMany(Associate::class, 'holder_id');
    }
}
