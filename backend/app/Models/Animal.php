<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
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

    public function scopeFilter(Builder $query, $filters) {

        // Pricing Filter
        $query->when($filters["price"] ?? null, function() use ($query, $filters) {
            $query->whereBetween("price", [ $filters["from"], $filters["to"] ]);
        });

        // Breed Filter
        $query->when($filters["breed"] ?? null, function() use ($query, $filters) {
            $query->whereHas("breed", function($query) use($filters) {
                $query->where("breed", $filters["breed"]);
            });
        });

        // Age Filter
        $query->when($filters["age"] ?? null, function() use ($query, $filters) {
            $query->whereHas("age", function($query) use($filters) {
                $query->where("age", $filters["age"]);
            });
        });

        $query->when($filters["gender"] ?? null, function() use ($query, $filters) {
            $query->where("gender", $filters["gender"]);
        });
    }
}
