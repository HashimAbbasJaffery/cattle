<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use App\Models\Age;
use App\Models\Animal;
use App\Models\Breed;
use Illuminate\Support\Facades\Route;

Route::get("/", function() {

    if(request()->expectsJson()) {
        $filters = [
            "keyword" => request()->keyword,
            "from" => request()->from,
            "to" => request()->to,
            "price" => [request()->from, request()->to],
            "breed" => request()->breed,
            "age" => request()->age,
            "gender" => request()->gender
        ];

        $animals = Animal::filter($filters)->paginate(8)->withQueryString();

        return $animals;
    }

    $animals = Animal::paginate(8);
    $breeds = Breed::get();
    $ages = Age::get();
    return view("index", compact("animals", "breeds", "ages"));
})->name("animals.listing");

Route::get("/breeds", function() {
    return Breed::get();
});

Route::get("/ages", function() {
    return Age::get();
});

Route::get("/admin/setting", function() {
    return view("admin.Setting.setting");
});

Route::get("/admin/categories", function() {
    $breeds = Breed::withCount("animals")->get();
    $ages = Age::withCount("animals")->get();
    return view("admin.Categories.index", compact("breeds", "ages"));
});

Route::post("/admin/age/create", function() {
    $age = Age::create([
        "age" => request()->age
    ]);
    return $age;
})->name("age.create");
Route::post('/admin/breeds/create', function() {
    $breed = Breed::create([
        "breed" => request()->breed
    ]);
    return $breed;
});
Route::delete("/admin/breed/{breed}/delete", function(Breed $breed) {
    $breed->delete();
});
Route::delete("/admin/age/{age}/delete", function(Age $age) {
    $deleted_age = $age;
    $age->delete();
    return $deleted_age;
});
Route::put("/admin/age/{age}/update", function(Age $age) {
    $age = $age->update([
        "age" => request()->age
    ]);
    return $age;
});

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
