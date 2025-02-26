<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;

class Animal extends Model
{
    use HasFactory;
    protected $with = [ "breed", "age" ];
    protected $guarded = [ "id", "created_at", "updated_at" ];

    public function breed() {
        return $this->belongsTo(Breed::class);
    }

    public function age() {
        return $this->belongsTo(Age::class);
    }

    public function scopeFilter(Builder $query, $filters) {

        // Searchng FIlter
        $query->when($filters["keyword"] ?? false, function() use ($query, $filters) {
            $query->whereLike("name", "%" . $filters["keyword"] . "%");
        });

        // Pricing Filter
        $query->when(isset($filters["from"]) && isset($filters["to"]), function() use ($query, $filters) {
            $query->whereBetween("price", [ $filters["from"], $filters["to"] ]);
        });

        // Pricing Filter
        $query->when($filters["price"] ?? null, function() use ($query, $filters) {
            $query->whereBetween("price", [ $filters["price"][0] ?? PHP_INT_MIN, $filters["price"][1] ?? PHP_INT_MAX ]);
        });
        // Breed Filter
        // $query->when($filters["breed"] ?? null, function ($q) use ($filters) {
        //     if (is_array($filters["breed"]) && !empty($filters["breed"])) {
        //         $q->whereIn("breed_id", $filters["breed"]);
        //     } else {
        //         $q->where("breed_id", $filters["breed"]);
        //     }
        // });

        $query->when($filters["breed"] ?? null, function($query) use ($filters) {
            Log::info($filters["breed"]);
            $query->whereHas("breed", function($query) use($filters) {
                if(is_array($filters["breed"])) {
                    $query->whereIn("id", $filters["breed"]);
                } else {
                    $query->where("breed", $filters["breed"]);
                }
            });
        });

        $query->when($filters["age"] ?? null, function($query) use ($filters) {
            $query->whereHas("age", function($query) use($filters) {
                if(is_array($filters["age"])) {
                    $query->whereIn("id", $filters["age"]);
                } else {
                    $query->where("age", $filters["age"]);
                }
            });
        });

        $query->when($filters["gender"] ?? null, function($query) use($filters) {
            if(is_array($filters["gender"])) {
                $query->whereIn("gender", $filters["gender"]);
            } else {
                $query->where("gender", $filters["gender"]);
            }
        });
        

        // // Age Filter
        // $query->when($filters["age"] ?? null, function() use ($query, $filters) {
        //     if(is_array($filters["age"]) && !empty($filters["age"])) {
        //         $query->whereIn("age_id", $filters["age"]);
        //     } else {
        //         $query->where("age_id", $filters["age"]);
        //     }
        // });

        // $query->when(isset($filters["gender"]), function() use ($query, $filters) {
        //     if(is_array($filters["gender"]) && !empty($filters["gender"])) {
        //         $query->whereIn("gender", $filters["gender"]);
        //     } else {
        //         $query->where("gender", $filters["gender"]);
        //     }
        // });
    }
}
