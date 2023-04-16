<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['associate_id', 'name', 'document'];


    public function associate()
    {
        return $this->belongsTo(Associate::class, 'associate_id');
    }
}
