<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $with = [ "breed", "age" ];

    public function breed() {
        return $this->belongsTo(Breed::class);
    }

    public function age() {
        return $this->belongsTo(Age::class);
    }
}
