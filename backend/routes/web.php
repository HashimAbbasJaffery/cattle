<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Event;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

Route::get("/", function() {
    $animals = Animal::paginate(8);
    $breeds = Breed::get();
    return view("index", compact("animals", "breeds"));
})->name("animals.listing");

Route::get("/animal/{animal:slug}", [AnimalController::class, "index"])->name("animal.single");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
