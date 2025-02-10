<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Event;
use App\Models\Setting;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(Animal $animal) {
        $events = Event::all();
        $setting = Setting::first();
    
        $more_animals = Animal::whereHas("breed", function($query) use($animal) {
            return $query->where("breed", $animal->breed->breed);
        })->orWhereHas("age", function($query) use ($animal){
            return $query->where("age", $animal->age->age);
        })->orWhere("gender", $animal->gender)->whereNot("id", $animal->id)->limit(10)->get();
        
        return view("single", compact("animal", "events", "setting", "more_animals"));
    }
}


